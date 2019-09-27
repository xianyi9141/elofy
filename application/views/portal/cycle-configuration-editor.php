<style>
    a.cancelar_btn{
        padding: 10px 28px !important;
    }
    .custom_radio{
        width:100%;
    }
    .button_sets.backlink a{
        color: #fff;
    }
    .select2-choices{
        background: #FFFFFF !important;
    }
    .table-body{
    }
    .overflow_dv {
        width: 100%;
        overflow: visible;
        max-height: 300px;
        overflow-y:auto;
     /* min-height: 80px; */
    }
    textarea{
        resize:none;
    }
    .button_sets{
        cursor: pointer;
    }
    label.input-label{
        text-transform: uppercase;
    }
    label.low-input-label{
        text-transform: capitalize;
    }
    .input-group .form-control:first-child{
        padding-right:0;
    }
    .full-width{
       width:100%;
       margin:0;
    }
    .table_cell_cil{
        width: 30%;
        border-bottom: 1px solid #ddd;
    }
    .table-header .table_cell_cil{
        border-top:1px solid #ddd;
    }
    .table-data .table_cell_cil{
        line-height: 45px;
    }
    .btn-draft{
        display: inline-block;
        width: auto;
        padding: 5px 10px;
        font-weight: 500;
        color: #999;
        font-size: 14px;
        margin: 0 2px;
        border-radius: 4px;
        border:1px solid #ddd;
    }
    div.step1, div.step2, div.step3, div.step4{
        box-sizing: border-box;
    }
    a.cancelar_btn{
        padding: 7px 28px !important;
	}
	.oculta{
		display:none;
	}
	.exibe{
		display:block;
	}
</style>

<form id="saveform1">

<div ng-controller="cycleConfigeditorCtrl" id="cycleConfig">
<div id="elofy-overlay-loader" ng-show="contentLoading > 0" >
    <img src="<?php echo base_url()?>assets/portal/img/preloader_2.gif" alt="close"/>
</div>
    <h2 class="new_heading_dv">
        Revisão de Ciclo
    </h2>
    <hr>
	<div class="add_new_function" >
		<div class="add_new_function_title">
			Configuração
			<div class="pull-right">
				<button type="button" ng-if="revisao_ciclo.id_revisao_ciclo>0 && revisao_ciclo.situacao==0" class="btn btn-success ng-scope updateSituacao" ng-click="updateSituation(revisao_ciclo.id_revisao_ciclo, 1)">Iniciar Etapa de Feedback</button>
				<button type="button" ng-if="revisao_ciclo.id_revisao_ciclo>0 && revisao_ciclo.situacao==1" class="btn btn-danger ng-scope updateSituacao" ng-click="updateSituation(revisao_ciclo.id_revisao_ciclo, 0)">Encerrar etapa de feedback</button>
				<button type="button" ng-if="revisao_ciclo.id_revisao_ciclo>0 && revisao_ciclo.liberado==0" class="btn btn-success ng-scope saveautorizar" ng-click="saveAutorizar(revisao_ciclo.id_revisao_ciclo)">Iniciar Ciclo</button>
				<button type="button" ng-if="revisao_ciclo.id_revisao_ciclo>0 && revisao_ciclo.liberado==1" class="btn btn-danger ng-scope savedeautorizar" ng-click="saveDeautorizar(revisao_ciclo.id_revisao_ciclo)">Interromper</button>
			</div>
		</div>
		<div class="col-sm-12">
		<h3>Informações Básicas</h3>
		</div>
		<div class="" style="margin-top: 15px;">
			<div class="col-sm-12" style="">
				<input type="hidden" id="id_revisao_ciclo" class="form-control" name="id_revisao_ciclo" ng-model="revisao_ciclo.id_revisao_ciclo" value="<?php echo $this->session->userdata('id_revisao_ciclo'); ?>"/>
				<div class=" col-sm-3">
						<!-- <pre>{{revisoes | json}}</pre> -->
<!-- 						<pre ng-repeat="revisao in revisoes">{{revisao.nome}} || {{revisao.id_revisao}}</pre>			
 -->						
								<div class="filters_view">
									<label class="input-label">Ciclo</label>
									<select required id="id_revisao" ng-change="idRevisaoChange()" name="id_revisao" class="" ng-model="revisao_ciclo.id_revisao" data-placeholder="Escolha o Ciclo" ng-disabled="disable_form==1">
										<option value=""></option>
										<option ng-repeat="group in revisoes" value="{{group.id_revisao}}">{{group.nome}}</option>
									</select>
								</div>
					</div>
						<div class="col-sm-1" style="padding-top: 26px;">
 							<a href="javascript:void(0);" ng-click="newCicle()" class="btn btn-orange ng-scope">Novo Ciclo</a>
						</div>
					<div class="col-sm-6">
						<label class="input-label">Nome da Revisão de Ciclo</label>
						<input id="nome_ciclo" name="nome_ciclo" type="text" ng-model="revisao_ciclo.nome_ciclo" required placeholder="Nome do Ciclo" class="form-control" ng-disabled="disable_form==1">
					</div>
					<div class="col-sm-2">
							<div class="filters_view">
								
									<label class="input-label" for="ativo">Ativo</label>
									<select id="ativo" name="ativo" class="select2 pesquisa-activity" ng-model="revisao_ciclo.ativo" ng-disabled="disable_form==1">
										<option value="0">Inativo</option>
										<option value="1">Ativo</option>
									</select>
								
							</div>
						</div>
				</div>
				<div class="col-sm-12" style="padding-bottom: 15px;margin-top:10px;">
						<div class="col-sm-2">
							<label>{{ 'UI.YEAR' | translate }}</label>
							<div class="clearfix"></div>
							<div class="filters_view">
								<select name="id_janela" id="id_janela" ng-model="selectedYear" data-native="true" data-placeholder="Selecione o Ano" ng-change="loadCycles()" ng-options="year for year in years" ng-disabled="disable_form==1">
									<option value=""></option>
								</select>
							</div>
						</div>
						<div class="col-sm-2">
							<label>Trimestre Inicio</label>
							<div class="clearfix"></div>
							<div class="filters_view">
								<select id="id_ciclo_ini" name="id_ciclo_ini" class="trimestres" ng-model="revisao_ciclo.id_ciclo_ini" data-placeholder="Trimestre Init" ng-disabled="disable_form==1">
									<option value=""></option>
									<option ng-repeat="cycle in cycles" value="{{cycle.id}}">{{cycle.name}}</option>
								</select>
							</div>
						</div>
						<div class="col-sm-2">
							<label>Trimestre Fim</label>
							<div class="clearfix"></div>
							<div class="filters_view">
								<select id="Id_ciclo_fim" name="Id_ciclo_fim" class="trimestres" data-placeholder="Trimestre Fim" ng-model="revisao_ciclo.Id_ciclo_fim" ng-disabled="disable_form==1">
									<option value=""></option>
									<option ng-repeat="cycle in cycles" value="{{cycle.id}}">{{cycle.name}}</option>
								</select>
							</div>
						</div>
						<div class="col-sm-2">
							<label>De</label>
							<div class="clearfix"></div>
							<div class="filters_view">
								<input id="data_inicio" name="data_inicio" type="text" value="" ng-model="revisao_ciclo.data_inicio" required placeholder="Data de Inicio" class="form-control data" pattern="^\d{1,2}\/\d{1,2}\/\d{4}$" >
							</div>
						</div>
						<div class="col-sm-2">
							<label>Ate</label>
							<div class="filters_view">
								<input id="data_fim" name="data_fim" type="text" value="" ng-model="revisao_ciclo.data_fim" placeholder="Data de Fim" required="" class="form-control data" pattern="^\d{1,2}\/\d{1,2}\/\d{4}$">
								<div class="input-group-addon hide"> <a href="#"><i class="entypo-calendar"></i></a> </div>
							</div>
						</div>
				</div>					
				<div class="col-sm-12">
					<div class="col-sm-4">
						<!-- <pre>{{available_scales | json}}</pre> -->
<!-- 						<pre ng-repeat="scale in available_scales">{{scale.label_regua}} || {{scale.id_regua}}</pre>
 -->						<label class="input-label">Qual régua você deseja de usar?</label>
						<div class="clearfix"></div>
						<input type="hidden" name="escala" value="0">
						<div class="filters_view">
							<select id="id_tipo_pesquisa" ng-change="tipoChange()" name="id_regua" class="" ng-model="revisao_ciclo.id_regua" required data-placeholder="Escolha Escala" ng-disabled="disable_form==1">
								<option value=""></option>
								<option ng-repeat="scale in available_scales" value="{{scale.id_regua}}">{{scale.label_regua}}</option>
							</select>
						</div>
						</div>
					<div class="col-sm-4">
						<!-- <div class="form-group label_set-left"> -->
						<div class="label_set-left">
							<label class="input-label" for="days"> Tempo de Empresa (Elegibilidade) </label>
							<input class="form-control" required placeholder="Dias" type="text" name="days" id="days" value="{{ revisao_ciclo.days }}" ng-disabled="disable_form==1" pattern="^(0|[1-9][0-9]*)$">
							<div class="requirements"> Digite, em dias, o tempo de empresa minimo para participar do ciclo
					</div>
    					</div>
    				</div>
				</div>

					<div class="clearfix"></div>
				</div>
				<div class="">
					<div class="col-sm-12">
				<h3>Etapas do Ciclo de Revisão</h3>
				<div class="col-sm-12" style="margin-top: 15px;">
				<input type="hidden" id="nine_checkbox" class="form-control">
				<div class="" id="fase_dv_{{ $index }}" ng-repeat="cycleRow in cyclesRows">
					<div class="col-sm-2">
						<label>Nome da Fase</label>
						<div class="clearfix"></div>
						<div class="filters_view">
							<input type="hidden" id="cycleId_{{ $index }}" name="cycleId[]" ng-model="cycleRow.id_revisao_ciclo_fases" value="{{cycleRow.id_revisao_ciclo_fases}}" >
							<input id="nome_fase_{{ $index }}" placeholder="Nome da Fase" required='true' name="nome_fase[]" type="text" ng-model="cycleRow.nome_fase" class="form-control"ng-disabled="disable_form==1">
						</div>
					</div>
					<div class="col-sm-2">
						<div class="filters_view">
							<!-- <div class="form-group"> -->
								<label class="input-label" for="componente_{{ $index }}">Etapa</label>
								<div class="clearfix"></div>
								<select id="componente_{{ $index }}" required='true' name="componente[]" ng-model="cycleRow.componente" class="componente" ng-change="changeComponent($index)" data-placeholder="Choose Componente" ng-disabled="disable_form==1" >
									<option value=""></option>
									<option value="{{ componentOption.key }}" ng-repeat="componentOption in componentOptions" >{{ componentOption.value }}</option>
								</select>
							<!-- </div> -->
						</div>
					</div>
					<div class="col-sm-2">
						<div class="filters_view" id="questionario_block_{{ $index }}" ng-show="cycleRow.componente=='O' || cycleRow.componente=='T' || cycleRow.componente=='S'">
							<!-- <div class="form-group"> -->
								<label class="input-label" for="questionario_{{ $index }}">Questionário</label>
								<select name="questionario[]" id="questionario_{{ $index }}" ng-model="cycleRow.questionario" class="questionario usuario-activity" data-placeholder="Escolha o questionário" ng-disabled="disable_form==1">
									<option value=""></option>
									<option ng-repeat="quest in questionarios" value="{{quest.id_questionarios}}">{{quest.nome_questionario}}</option>
								</select>
							<!-- </div> -->
						</div>
					</div>
					<div class="col-sm-5" id="etapas_avaliacao" style="border: 1px solid #eee; border-radius: 5px;">
						<div style="margin-top:10px; ">
							<div class="col-sm-12" style="padding-left: 0px;">
							<label>Quem irá avaliar?</label>
							</div>
							<div class="model_bod checkbox_layout" id="autavalida_block_{{ $index }}">
								<div class="model_ch">
									<div class="model_che">
										<input type="hidden" id="autavaliaHidden_{{ $index }}" name="autoavalia[]" value="{{cycleRow.autoavalia}}" >
										<input type="checkbox" ng-click="checkAutaovalia($index)" ng-model="autoavaliaCheckbox" id="autavalia_{{ $index }}" ng-checked="cycleRow.autoavalia==1" ng-disabled="disable_form==1">
										<label for="autavalia_{{ $index }}" style="font-size:12px">Autoavalia</label>
									</div>
								</div>
							</div>
							<div class="model_bod checkbox_layout" id="avaliacao_de_pares_block_{{ $index }}">
								<div class="model_ch">
									<div class="model_che">
										<input type="hidden" id="paresHidden_{{ $index }}" name="pares[]" value="{{ cycleRow.pares }}">
										<input type="checkbox" id="pares_{{ $index }}" ng-model="paresCheckbox" ng-click="checkPares($index)" ng-checked="cycleRow.pares==1" ng-disabled="disable_form==1">
										<label for="pares_{{ $index }}" style="font-size:12px">Avaliação pares</label>
									</div>
								</div>
							</div>
							<div class="model_bod checkbox_layout" id="gestor_block_{{ $index }}">
								<div class="model_ch">
									<div class="model_che">
										<input type="hidden" id="gestorHidden_{{ $index }}" name="gestor[]" value="{{ cycleRow.gestor }}">
										<input type="checkbox" ng-click="checkGestor($index)" ng-model="gestorCheckbox" id="gestor_{{ $index }}" ng-checked="cycleRow.gestor==1" ng-disabled="disable_form==1">
										<label for="gestor_{{ $index }}" style="font-size:12px">Gestor</label>
									</div>
								</div>
							</div>
							<div class="model_bod checkbox_layout" id="gestor_block_{{ $index }}">
								<div class="model_ch">
									<div class="model_che">
										<input type="hidden" id="equipeHidden_{{ $index }}" name="equipe[]" value="{{ cycleRow.equipe }}">
										<input type="checkbox" ng-click="checkEquipe($index)" ng-model="equipeCheckbox" id="equipe_{{ $index }}" ng-checked="cycleRow.equipe==1" ng-disabled="disable_form==1">
										<label for="equipe_{{ $index }}" style="font-size:12px">Equipe</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="col-sm-6">
							<div class="model_bod checkbox_layout" id="gestor_block_{{ $index }} col-sm-3">
								<label for="grafico_{{ $index }}"> Permissões da Fase </label>
								<div class="model_ch">
									<div class="model_che">
										<input type="hidden" id="graficoHidden_{{ $index }}" name="grafico[]" value="{{ cycleRow.grafico }}">
										<input type="checkbox" ng-click="checkGrafico($index)" ng-model="graficoCheckbox" id="grafico_{{ $index }}" ng-checked="cycleRow.grafico==1" ng-disabled="disable_form==1">
										<label for="grafico_{{ $index }}" style="font-size: 14px; font-weight: 400;"> Resultados visíveis em Performance Pessoal </label>
									</div>
								</div>
							</div>
						</div>
							<div class="col-sm-6">
								<label>Quer definir a média final desta etapa como um eixo do Ninebox?</label>
							<div class="nine_xy_block" id="nine_xy_block_{{ $index }}">
								<div class="model_bod checkbox_layout" class="nine_block_{{ $index }}">
									<div class="model_ch col-sm-6" style="padding-left: 0px;">
										<div class="model_che">
											<input type="hidden" id="checkbox_nine_hidden_x_{{ $index }}" name="x_nine[]" value="{{ cycleRow.x_nine }}">
											<input type="checkbox" ng-click="check_nine_x($index)" id="checkbox_nine_x_{{ $index }}" ng-checked="cycleRow.x_nine==1" ng-disabled="disable_form==1">
											<label for="checkbox_nine_x_{{ $index }}" style="font-size:12px">X Nine</label>
										</div>
									</div>
									<div class="model_ch col-sm-6">
										<div class="model_che">
											<input type="hidden" id="checkbox_nine_hidden_y_{{ $index }}" name="y_nine[]" value="{{ cycleRow.y_nine }}">
											<input type="checkbox" ng-click="check_nine_y($index)" id="checkbox_nine_y_{{ $index }}" ng-checked="cycleRow.y_nine==1" ng-disabled="disable_form==1">
											<label for="checkbox_nine_y_{{ $index }}" style="font-size:12px">Y Nine</label>
										</div>
									</div>
								</div>
									
							</div>
							</div>
							
							
					</div>
					<div class="col-sm-12" style="padding-bottom: 30px;">
						<div class="col-sm-4">
						<div class="model_bod checkbox_layout" id="comment_block_{{ $index }}" ng-init="validateCheckComment($index)">
								<div class="model_che">
									<!-- EXIBIR GRÁFICOS -->
									<div id="div_exibir_grafico_{{ $index }}" ng-if="graficoCheckbox == 1 || cycleRow.grafico==1">
										<input type="hidden" id="exibirGraficoHidden_{{ $index }}" name="exibir_grafico[]" value="{{ cycleRow.exibir_grafico }}">
										<input type="checkbox" ng-click="checkExibirGrafico($index)" ng-model="exibirGraficoCheckbox" id="exibir_grafico_{{ $index }}" ng-checked="cycleRow.exibir_grafico==1" ng-disabled="disable_form==1">
										<label for="exibir_grafico_{{ $index }}" style="font-size: 14px; font-weight: 400;"> Exibir Gráfico </label>
									</div>
									<!-- EXIBIR GRÁFICOS -->
									<div class="model_che" style="padding-top:10px;">
										<input type="hidden" id="commentHidden_{{ $index }}" name="comment[]" value="{{ cycleRow.comentario }}">
										<input type="checkbox" ng-click="checkComment($index)" ng-model="commentCheckbox" id="comment_{{ $index }}" ng-checked="cycleRow.comentario==1" ng-disabled="disable_form==1" value="1">
										<label for="comment_{{ $index }}" style="font-size: 14px; font-weight: 400;">Permitir comentários nas respostas</label>
										<div style="padding-top:10px;" id="div_campo_obrigatorio_{{ $index }}" ng-if="commentCheckbox == 1 || cycleRow.comentario==1">
											<input type="hidden" id="commentRequiredHidden_{{ $index }}" name="commentRequired[]" value="{{ cycleRow.comentario_obrigatorio }}">
											<input type="checkbox" ng-click="checkCommentRequired($index)" ng-model="commentRequiredCheckbox" id="commentRequired_{{ $index }}" ng-checked="cycleRow.comentario_obrigatorio==1" ng-disabled="disable_form==1">
											<label for="commentRequired_{{ $index }}" style="font-size: 14px; font-weight: 400;">Comentários Obrigatórios</label>
										</div>

									</div>
								</div>
								
							</div>						
						</div>
						
						<div style="float: right;">
							<div class="filters_view col-sm-4">
							<label class="input-label">&nbsp;</label>
							<button class="btn btn-sm btn-custom-red" ng-if="$index != cyclesRows.length && showRemoveButton" ng-click="removeCycles($index,cyclesRows.length)" ng-disabled="disable_form==1">
								<i class="fa fa-minus"></i>
							</button>
							<button class="btn btn-sm btn-custom-blue" ng-if="$index == cyclesRows.length - 1 && !removeAddMoreButton" ng-click="addMoreCycles($index,cyclesRows.length)" ng-disabled="disable_form==1">
								<i class="fa fa-plus"></i>
							</button>
						</div>
							<div class="col-sm-4">
						<div class="filters_view">
							<label class="input-label" for="ordem">Ordem</label>
							<input name="ordem[]" id="ordem_{{ $index }}" ng-model="cycleRow.ordem" type="text"  class="ordem form-control" ng-disabled="disable_form==1"/>
    					</div>
						</div>		
						</div>
						</div>
				</div>
			</div>
													</div>
			</div>
			<div class="col-sm-12">
			<h3>Configurações Adicionais do Ciclo</h3>
			</div>
			<div class="col-sm-12" style="margin-top: 30px;">
				<div class="col-sm-12" style="border: 1px solid #eee; padding-left: 0px;">
				<div class="col-md-12">
							<h3 style="font-size: 18px;">Tela de Gestão do Ciclo</h3>
						<div class="model_ch model_bod">
							<div class="model_che" >
								<input type="checkbox"  name="revisao_gestor" id="revisao_gestor" ng-checked="revisao_ciclo.revisao_gestor==1" value="1" ng-model="revisao_gestor" ng-disabled="disable_form==1">
								<label style="font-size: 14px; font-weight: 400;" for="revisao_gestor"> Os gestores serão avaliados no processo? </label>
							</div>
						</div>
					</div>
				<div class="col-md-12" >
						<div class="model_ch model_bod">
							<div class="model_che" >
								<input type="checkbox" style="" name="revisao_pares" id="revisao_pares" ng-checked="revisao_ciclo.revisao_pares==1" value="1" ng-model="revisao_pares" ng-disabled="disable_form==1">
								<label style="font-size: 14px; font-weight: 400;" for="revisao_pares"> Habilitar a seleção de pares para o gestor de RH </label>
							</div>
						</div>
					</div>
				</div>
			</div>	
			<div class="col-sm-12" style="margin-top: 30px;">
					<div class="col-md-12" style="border: 1px solid #eee;">
							<h3 style="font-size: 18px;">Tela de Performance</h3>
						<div class="model_ch model_bod">
							<div class="model_che" >
								<input type="checkbox" style="" name="conceito" id="conceito" ng-checked="revisao_ciclo.conceito==1" value="1" ng-disabled="disable_form==1">
								<label style="font-size: 14px; font-weight: 400;" for="conceito"> Exibir conceitos ao invés de notas </label>
							</div>
						</div>
						
						<div class="model_ch model_bod">
							<div class="model_che">
								<input type="checkbox" name="conceito_nine_box" id="conceito_nine_box" ng-checked="revisao_ciclo.conceito_nine_box==1" value="1" ng-model="conceito_nine_box" ng-disabled="disable_form==1" >
								<label style="font-size: 14px; font-weight: 400;" for="conceito_nine_box"> Exibir o conceito da 9box para o colaborador </label>
							</div>
						</div>

						<div class="model_ch model_bod">
							<div class="model_che">
								<input type="checkbox" name="rating_heart" id="rating_heart" ng-checked="revisao_ciclo.rating_heart==1" value="1" ng-model="rating_heart" ng-disabled="disable_form==1" >
								<label style="font-size: 14px; font-weight: 400;" for="rating_heart"> Exibir rating </label>
							</div>
						</div>

						<div class="model_ch model_bod">
							<div class="model_che">
								<input type="checkbox" name="exibir_regua" id="exibir_regua" ng-checked="revisao_ciclo.exibir_regua==1" value="1" ng-model="exibir_regua" ng-disabled="disable_form==1" >
								<label style="font-size: 14px; font-weight: 400;" for="exibir_regua"> Exibir régua de indicadores </label>
							</div>
						</div>
					</div>
				</div>
			<div class="col-sm-12" style="margin-top: 30px;">
				<div class="col-sm-12" style="border: 1px solid #eee; padding-left: 0px;">
				<div class="col-md-12">
					<h3 style="font-size: 18px;">Tela de Execução da Avaliação</h3>
						<div class="model_ch model_bod">
							<div class="model_che" >
								<input type="checkbox" style="" name="more_info" id="more_info" ng-checked="revisao_ciclo.more_info==1" value="1" ng-model="more_info" ng-disabled="disable_form==1">
								<label style="font-size: 14px; font-weight: 400;" for="more_info">Habilitar a visualização rápida de OKR's e Feedbacks das pessoas avaliadas durante as etapas de avaliação</label>
							</div>
						</div>
						<div class="model_ch model_bod">
							<div class="model_che">
								<input type="checkbox" name="okr" id="okr" ng-checked="revisao_ciclo.okr==1" value="1" ng-model="okr" ng-click="checkOKR()" ng-disabled="disable_form==1" >
								<label style="font-size: 14px; font-weight: 400;" for="okr"> Avaliar objetivos e resultados chave</label>
							</div>
						</div>
						<div class="model_ch model_bod">
							<div class="model_che">
								<input type="checkbox" name="informacoes_competencia" id="informacoes_competencia" ng-checked="revisao_ciclo.informacoes_competencia==1" value="1" ng-model="informacoes_competencia" ng-disabled="disable_form==1" >
								<label style="font-size: 14px; font-weight: 400;" for="informacoes_competencia"> Exibir mais informações da Competência</label>
							</div>
						</div>
						<div class="model_ch model_bod">
							<div class="model_che">
								<input type="checkbox" name="self" id="self" ng-checked="revisao_ciclo.self==1" value="1" ng-model="self" ng-disabled="disable_form==1" >
								<label style="font-size: 14px; font-weight: 400;" for="self"> Exibir a autoavaliação para o gestor no momento da resposta.</label>
							</div>
						</div>
					</div>
					<div class="col-md-12 model_bod">
						<div class="model_ch">
							<div class="model_che">
								<input type="checkbox" name="escolhe_par" id="escolhe_par" ng-checked="revisao_ciclo.escolhe_par==1" value="1" ng-model="escolhe_par" ng-click="checkEscolhePar()" ng-disabled="disable_form==1" >
								<label style="font-size: 14px; font-weight: 400;" for="escolhe_par"> Permitir que os avaliados possam escolher pares para avalia-los </label>
							</div>
						</div>
					</div>
					
			</div>
		</div>
		<div class="col-sm-12" style="margin-bottom: 30px;">
			<div class="col-sm-4" ng-if="revisao_ciclo.escolhe_par==1 || escolhe_par">
				<div class="form-group label_set-left">
					<label  class="input-label" for="numero_pares"> Número Mínimo </label>
					<input placeholder="Numero de Pares" class="form-control" type="number" name="numero_pares" id="numero_pares" value="{{ revisao_ciclo.numero_pares }}" ng-class="{'disable-content':disable_form==1 || !escolhe_par}" ng-required="escolhe_par">
				</div>
			</div>
			<div class="col-sm-4" ng-if="revisao_ciclo.escolhe_par==1 || escolhe_par">
				<div class="form-group label_set-left">
					<label  class="input-label" for="numero_pares_maximo"> Número Máximo </label>
					<input placeholder="Numero de Pares Maximo" class="form-control" type="number" name="numero_pares_maximo" id="numero_pares_maximo" value="{{ revisao_ciclo.numero_pares_maximo }}" ng-class="{'disable-content':disable_form==1 || !escolhe_par}" ng-required="escolhe_par">
				</div>
			</div>
		</div>
		<div class="col-sm-12">
				<div class="col-sm-12" style="border: 1px solid #eee; padding-left: 0px;">
				<div class="col-md-12">
					<h3 style="font-size: 18px;">Distribuição do Gestor</h3>
					<div class="model_ch model_bod">
						<div class="model_che" >
							<input type="checkbox" style="" name="gestor_time" id="gestor_time" ng-checked="revisao_ciclo.gestor_time==1" value="1" ng-model="gestor_time" ng-disabled="disable_form==1">
							<label style="font-size: 14px; font-weight: 400;" for="gestor_time">Gestor do Time</label>
						</div>
					</div>
				</div>
				<div class="col-md-12 model_bod">
					<div class="model_ch">
						<div class="model_che">
							<input type="checkbox" name="gestor_pessoa" id="gestor_pessoa" ng-checked="revisao_ciclo.gestor_pessoa==1" value="1" ng-model="gestor_pessoa" ng-disabled="disable_form==1" >
							<label style="font-size: 14px; font-weight: 400;" for="gestor_pessoa">Gestor da Pessoa</label>
						</div>
					</div>
				</div>
				<div class="col-md-12 model_bod">
					<div class="model_ch">
						<div class="model_che">
							<input type="checkbox" name="gestor_matriz" id="gestor_matriz" ng-checked="revisao_ciclo.gestor_matriz==1" value="1" ng-model="gestor_matriz" ng-disabled="disable_form==1" >
							<label style="font-size: 14px; font-weight: 400;" for="gestor_matriz">Gestor de Projeto</label>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12" style="margin-top: 30px;margin-bottom: 30px;">
				<div class="col-sm-12" style="border: 1px solid #eee; padding-left: 0px;">
				<div class="col-md-12">
					<h3 style="font-size: 18px;">Distribuição da Equipe</h3>
					<div class="model_ch model_bod">
						<div class="model_che" >
							<input type="checkbox" style="" name="str_funcional" id="str_funcional" ng-checked="revisao_ciclo.str_funcional==1" value="1" ng-model="str_funcional" ng-disabled="disable_form==1">
							<label style="font-size: 14px; font-weight: 400;" for="str_funcional">Equipe Funcional</label>
						</div>
					</div>
				</div>
				<div class="col-md-12 model_bod">
					<div class="model_ch">
						<div class="model_che">
							<input type="checkbox" name="str_matricial" id="str_matricial" ng-checked="revisao_ciclo.str_matricial==1" value="1" ng-model="str_matricial" ng-disabled="disable_form==1" >
							<label style="font-size: 14px; font-weight: 400;" for="str_matricial">Equipe do Projeto</label>
						</div>
					</div>
				</div>
				<div class="col-md-12 model_bod">
					<div class="model_ch">
						<div class="model_che">
							<input type="checkbox" name="str_resp_usu" id="str_resp_usu" ng-checked="revisao_ciclo.str_resp_usu==1" value="1" ng-model="str_resp_usu" ng-disabled="disable_form==1" >
							<label style="font-size: 14px; font-weight: 400;" for="str_resp_usu">Equipe conforme Gestor Imediato</label>
						</div>
					</div>
				</div>
			</div>
		</div>	
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
            <div class="clearfix"></div>
	<hr>
	<div class="add_new_function section-select">
		<div class="add_new_function_title">
			Selecionar amostra
		</div>
		<div class="form_add">
			<div class="form_add_row"  style="margin-bottom:35px;">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<div class="custom_radio custom_radio_sidebyside">
								<label class="input-label col-md-12">Selecione o público do processo de revisão de ciclo:</label>
								<div class="radio_dv">
									<input type="radio" id="public_mode0" ng-model="amostra" ng-checked="amostra==0" name="amostra" value="0" ng-disabled="disable_form==1">
									<label for="public_mode0">Aberto a todos</label>
								</div>
								<div class="radio_dv">
									<input type="radio" id="public_mode1" ng-model="amostra" ng-checked="amostra==1" name="amostra" value="1" ng-disabled="disable_form==1">
									<label for="public_mode1">Selecão dinâmica</label>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="form_add_row" ng-class="{hide:amostra==0}">
				<div class="col-sm-5">
					<label for="selected_user_type" class="input-label" style="float:left; width:auto">
						Tipo de profissional:
					</label>
					<div class="clearfix"></div>

					<select id="selected_user_type" name="selected_user_type" class="select2" data-placeholder="Escolha o tipo de usuário" ng-model="selectedUserType" ng-disabled="disable_form==1">
						<option value="" disabled="disabled" selected="selected">Selecione um tipo</option>
						<option value="4">Gestores</option>
						<option value="0">Contribuidores</option>
						<option value="">Todos</option>
					</select>
				</div>
				<div class="col-sm-5">
					<label for="selected_user_level" class="input-label" style="float:left; width:auto">
						Nível do profissional:
					</label>
					<div class="clearfix"></div>

					<select id="selected_user_level" name="selected_user_level" class="select2" data-placeholder="Escolha o nível do usuário" ng-model="selectedUserLevel" ng-disabled="disable_form==1">
						<option value="" disabled="disabled" selected="selected">Selecione um nível</option>
						<option value="{{nivel.nivel}}" ng-repeat="nivel in niveis">{{nivel.nivel}}</option>
					</select>
				</div>
			</div>
			<div class="form_add_row" ng-class="{hide:amostra==0}">
				<div class="col-sm-5">
					<div class="filters_view">
						<div class="form-group">
							<div class="form_add_row full-width">
								<label for="selectd_team" class="input-label" style="float:left; width:auto">
									Selecione os Times:
								</label>
								<div class="model_bod" style="display:inline-block; vertical-align:top; margin:0 10px; height:0; float:left" >
									<div class="model_ch">
										<div class="model_che">
											<input type="checkbox" id="chk_all_team" name="chk_all_team" value="1" ng-disabled="disable_form==1">
											<label for="chk_all_team" class="low-input-label"> Selecionar todos</label>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<select id="selectd_team" name="selectd_team[]"  class="select2" data-placeholder="Escolha o time" ng-model="keySelectTeams" ng-disabled="disable_form==1">
								<option value=""></option>
								<option ng-repeat="team in teams" value="{{team.id}}">{{team.name}}</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="filters_view">
						<div class="form-group">
							<div class="form_add_row full-width">
								<label for="selectd_users" class="input-label" style="float:left; width:auto">Selecionar pessoas:</label>
								<div class="model_bod" style="display:inline-block; vertical-align:top; margin:0 10px; height:0; float:left" >
									<div class="model_ch">
										<div class="model_che">
											<input type="checkbox" id="chk_all_user" name="chk_all_user" value="1" ng-disabled="disable_form==1">
											<label for="chk_all_user" class="low-input-label"> Selecionar todos</label>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<select id="selectd_users" name="selectd_users[]" class="select2" data-placeholder="Selecione Pessoas Específicas" ng-model="keySelectUsers" ng-disabled="disable_form==1">
								<option value=""></option>
								<option  ng-repeat="user in users" value="{{user.id}}">{{user.name}}</option>
							</select>
                            <!-- <span class="corresponsaveis-selected" ng-repeat="selected in byUsers" ng-click="removeUserAndRefresh(selected)"><label>{{selected.nome_usuario}}</label><i class="fa fa-remove"></i></span> -->

						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="form_add_row" ng-class="{hide:amostra==0}">
				<div class="col-sm-5">
                    <a href="javascript:void(0);" ng-click="cleanAmostra()" class="btn btn-orange ng-scope">Limpar Filtro</a>

				</div>

				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<hr>
	<div class="add_new_function" >
		<div class="add_new_function_title">
			Pessoas Selecionadas
		</div>
		<div class="form_add">
			<div class="form_add_row">
				<div class="col-sm-12">
					<div class="input-group full-width">
						<input type="text" class="form-control transparent" placeholder="Pesquise" id="search_text" ng-model="search_text" >
						<span class="input-group-btn">
							<button type="submit"><i class="entypo-search"></i></button>
						</span>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="form_add_row table-body overflow_dv">
				<div class="col-sm-12">
					<div class="tbale_dv">
						<div class="table_row_cil table-header">
							<div class="table_cell_cil text-left">
								<span>Pessoa</span>
							</div>
							<div class="table_cell_cil text-left">
								<span class="text-left" style="text-align:left">Time</span>
							</div>
							<div class="table_cell_cil text-left">
								<span class="text-left" style="text-align:left">Tipo de Profissional</span>
							</div>
							<div class="table_cell_cil text-left">
								<span class="text-left" style="text-align:left">Nível</span>
							</div>
							<div class="table_cell_cil">
								<span></span>
							</div>
						</div>
						<div class="table_row_cil table-data users-group-item "  data-id="{{user.id_time}}_{{user.id_usuario}}" ng-repeat="user in usersTeams | filter:search_text">
							<div class="table_cell_cil text-left">
								<span style="text-align:left">{{user.nome_usuario}}</span>
							</div>
							<div class="table_cell_cil" class="text-left">
								<span style="text-align:left">{{ user.nome_unidade }}</span>
							</div>
							<div class="table_cell_cil" class="text-left">
								<span style="text-align:left">{{ (user.tipo_cargo == 4) ? 'Gestor' : 'Contribuidor' }}</span>
							</div>
							<div class="table_cell_cil" class="text-left">
								<span style="text-align:left">{{ user.nivel }}</span>
							</div>

							<div class="table_cell_cil text-right">
								<div class="div_action">
									<a href="javascript:void(0)" ng-hide="disable_form==1" ng-click="deleteUser(user.id_time, user.id_usuario)" class="dlts"><i class="fa fa-times"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<hr>
	<div class="add_new_function" >
		<div class="add_new_function_title">
			Mensagem
		</div>
		<div class="form_add">
			<div class="form_add_row col-md-6 col-md-offset-3">
				<div class="custom_radio custom_radio_sidebyside">
					<label>Deseja enviar um e-mail para o público participante do ciclo?</label>
					<div class="radio_dv">
						<input type="radio" id="send_message0" ng-value="0" ng-model="send_message" class="ng-pristine ng-untouched ng-valid valid ng-empty public_mode" aria-required="true" ng-checked="send_message==0" name="send_message" value="0" ng-disabled="disable_form==1">
						<label for="send_message0">Não</label>
					</div>
					<div class="radio_dv">
						<input type="radio" id="send_message1" ng-value="1" ng-checked="send_message==1" ng-model="send_message" class="ng-pristine ng-untouched ng-valid valid ng-empty" name="send_message" value="1" ng-disabled="disable_form==1">
						<label for="send_message1">Sim</label>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="hide" ng-class="{show:send_message==1}">
				<div class="col-sm-12">
					<div class="add_new_function_title" style="border-bottom: none; padding-left:0">
						Descreva abaixo
					</div>
					<div class="form_add_row">
						<label>Corpo do e-mail ({USER_NAME} {REVIEW_LINK})</label>
						<textarea name="corpo_email" ng-model="revisao_ciclo.email" id="corpo_email" value="empty" class="form-control ng-binding" rows="5"></textarea>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<button ng-if="send_message==1" class="confirmar pull-right" id="sendemailtouser" type="button" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvar" ng-click="sendEmail()">Send Mail</button>
		</div>
        <div class="clearfix"></div>
	</div>
	 <div class="add_new_function" >
		<div class="add_new_function_title">
			Definição de Pontuação
		</div>
				<div style="padding-left: 20px; padding-top: 20px;">
			<div  class="col-md-2" style="width: 140px !important; padding-top: 7px; padding-left: 0px;">
				<label>Regra de Cálculo:&nbsp;&nbsp;&nbsp;&nbsp;</label>
			</div>
			<div class="col-md-2">
				<select id="calc_rule" name="calc_rule" multiple="multiple" ng-init="calc_rule = 0" ng-model="calc_rule">
					<option value="0">Média</option>
					<option value="2">Soma</option>
				</select>
			</div>
		</div>
		 <div class="form_add">
			<div class="DV_table_view_elofy cli">
				<div class="table-responsive content horizontal-images">

				<!-- <pre>{{results | json}}</pre> -->
		
				<!-- <hr> -->
				<table class="table table-bordered"style="position: relative;overflow-x: auto; background-color:" id="tablescroll">
					<tr>
						<td  class="set_middle text_trans" width="10%">Nome fase</td>
						<td class="set_middle creamback text_trans" width="3%">Auto availiação</td>
						<td class="set_middle text_trans lightback" width="6%">peso</td>
						<td class="set_middle text_trans greenback" width="3%">Gestor</td>
						<td class="set_middle text_trans lightback" width="6%">peso</td>
						<td class="set_middle text_trans blueback" width="3%">Pares</td>
						<td class="set_middle text_trans lightback" width="6%">peso</td>
						<td class="set_middle text_trans purpleback" width="3%">Equipe</td>
						<td class="set_middle text_trans lightback" width="6%">peso</td>
						<td class="set_middle text_trans" width="6%">Utilizar para Média Final</td>
						<td class="set_middle text_trans " width="6%" id="linear">Linear</td>
					</tr>
					<tr  id="tipo_score_{{ $index }}"  ng-repeat="cycleRow in cyclesRows" ng-if="cycleRow.componente" >
					
						<td class="text_trans set_middle">
							<input type="hidden" value="{{fase[$index].id_revisao_ciclo_fases}}" name="id_fase_score['{{cycleRow.componente}}']" id="id_fase_score_{{$index}}"> 
							<input type="hidden" value="{{cycleRow.componente}}" name="id_fase[]"> {{cycleRow.nome_fase}}
							(<span ng-if="cycleRow.componente== 'C'">COMPETÊNCIAS</span>
							<span ng-if="cycleRow.componente== 'O'">RESULTADOS</span>
							<span ng-if="cycleRow.componente== 'T'">POTENCIAL</span>
							<span ng-if="cycleRow.componente== 'V'">VALORES</span>
							<span ng-if="cycleRow.componente== 'S'">FEEDBACK</span>)
							
						</td>
						<td class="creamback">
							<div class="form-group ">
								<div class="checkbox set_middle compauto_table_parent" style="margin-top:2px;">
									<input type="checkbox"  value="{{cycleRow.componente}}" id="{{cycleRow.componente}}_auto" name="table_tipo[0][]" class="styled-checkbox" ng-checked="tiposcore[$index][1].tipo_avaliacao==1" ng-click="checktableauto(cycleRow.componente,cycleRow.nome_fase,$index,'tipo')">
									<label for="{{cycleRow.componente}}_auto"></label>
								</div>
							</div>
						</td>
						<td class="lightback">
							<div class="form-group   set_width comppeso0_table_parent" >
								<input type="number" class="form-control" value="{{tiposcore[$index][1].peso}}" id="{{cycleRow.componente}}_checkpeso0" name="checkpeso[0][]" ng-disabled="checktableauto(cycleRow.componente,cycleRow.nome_fase,$index,'peso')">
							</div>
						</td>
						<td class="set_middle greenback">
							<div class="form-group ">
								<div class="checkbox set_middle compgestor_table_parent" style="margin-top:2px;">
									<input type="checkbox" value="{{cycleRow.componente}}" id="{{cycleRow.componente}}_gestor" name="table_tipo[1][]" class="styled-checkbox"  ng-checked="tiposcore[$index][2].tipo_avaliacao==2"  ng-click="checktablegestor(cycleRow.componente,cycleRow.componente,$index,'tipo')">
									<label for="{{cycleRow.componente}}_gestor"></label>
								</div>
							</div>
						</td>
						<td class="lightback">
							<div class="form-group   set_width comppeso1_table_parent" >
								<input type="number" class="form-control" value="{{tiposcore[$index][2].peso}}" id="{{cycleRow.componente}}_checkpeso1" name="checkpeso[1][]" ng-disabled="checktablegestor(cycleRow.componente,cycleRow.nome_fase,$index,'peso')">
							</div>
						</td>
						<td class="set_middle blueback">
							<div class="form-group ">
								<div class="checkbox set_middle set_width comppares_table_parent" style="margin-top:2px;">
									<input type="checkbox"  value="{{cycleRow.componente}}" id="{{cycleRow.componente}}_pares" name="table_tipo[2][]" class="styled-checkbox"  ng-checked="tiposcore[$index][3].tipo_avaliacao==3" ng-click="checktablepares(cycleRow.componente,cycleRow.nome_fase,$index,'tipo')">
									<label for="{{cycleRow.componente}}_pares"></label>
								</div>
							</div>
						</td>
						<td class="lightback">
							<div class="form-group   set_width  comppeso2table_parent" >
								<input type="number" class="form-control" value="{{tiposcore[$index][3].peso}}" id="{{cycleRow.componente}}_checkpeso2" name="checkpeso[2][]" ng-disabled="checktablepares(cycleRow.componente,cycleRow.nome_fase,$index,'peso')">
							</div>
						</td>
						<td class="set_middle purpleback">
							<div class="form-group ">
								<div class="checkbox set_middle set_width compequipe_table_parent" style="margin-top:2px;">
									<input type="checkbox"  value="{{cycleRow.componente}}" id="{{cycleRow.componente}}_equipe"  name="table_tipo[3][]" class="styled-checkbox"  ng-checked="tiposcore[$index][4].tipo_avaliacao==4" ng-click="checktableequipe(cycleRow.componente,cycleRow.nome_fase,$index,'tipo')">
									<label for="{{cycleRow.componente}}_equipe"></label>
								</div>
							</div>
						</td>
						<td class="lightback">
							<div class="form-group   set_width autopeso3_table_parent" >
								<input type="number" class="form-control" value="{{tiposcore[$index][4].peso}}" id="{{cycleRow.componente}}_checkpeso3" name="checkpeso[3][]" ng-disabled="checktableequipe(cycleRow.componente,cycleRow.nome_fase,$index,'peso')">
							</div>
						</td>
						<td>
							<select class="form-control select-lg  mediafinalclass" id="final_{{$index}}" name="final['{{cycleRow.componente}}']"  ng-model="fase[$index].media_final" ng-change="check_media_final($index,'mediafinal')">
								<option value="1" ng-selected="fase[$index].media_final==1">Sim
								</option>
								<option value="0" ng-selected="fase[$index].media_final==0 ">Não
								</option>
							</select>
						</td>
						<td>
							<div class="form-group  set_width complinear_table_parent" >
								<input type="number" class="form-control" id="linear_{{$index}}" value="{{ fase[$index].peso }}" ng-disabled="check_media_final($index,'linear')==0" name="linear['{{ cycleRow.componente}}']">
							</div>
						</td>
					</tr>
				</table>
				<small ng-if="disable_form==1">Sempre que o ciclo estiver em execução e os critérios forem alterados as médias serão recalculadas.</small>
	<!-- <pre>{{ selectedSingleScores | json }}</pre> -->
			</div>
		</div>
    </div>
	 <div class="clearfix"></div>
	 </div>
	<input type="hidden" id="situacao" name="situacao" ng-model="situacao"/>
	<div class="col-sm-12 modalBotoes">
		<p class="error-message text-danger  hide" style="margin:0; line-height:34px;">Por favor preencha os campos destacados em vermelho.</p>
		<a href="javascript:void(0)" class="white yes btn-draft pull-right" ng-click="save_draft()">Salvar como rascunho</a> &nbsp;&nbsp;&nbsp;&nbsp;
		<a href="<?php echo base_url()?>cycleconfiguration" class="fechar">Fechar</a>
		<button  class="btn salvar" type="submit" data-loading-text="<i class='icon-spinner animate-spin'></i>Salvar">Salvar</button>	
	</div>
</form>

<div class="modal fade in" id="add-cicle">
    <div class="modal-dialog">
        <form id="new-cicle" class="modal-content">
            <div class="modal-header bg-primary">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Novo Ciclo</h4>
            </div>
            <div class="modal-body">

                <div class="form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cicle_name" class="control-label">Nome</label>
                                <input name="cicle_name" type="text" class="form-control" id="cicle_name">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary salvar" data-loading-text="<i class='icon-spinner animate-spin'></i> Salvando">Salvar</button>
            </div>
        </form>
    </div>
</div>