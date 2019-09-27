<!--
    @raptor view for pesquisa menu add
-->

<style>
    .input-label{
        text-transform: uppercase;
    }
    .left-label{
        width:inherit !important;
    }
    .select2-choices{
        background: #FFFFFF !important;
    }
    .border-right{
        border-right: solid 1px #ddd;
        top: -20px;
        height: 70px;
        position: absolute;
        width: 100%;
    }
    .image-replace.warning{
        background:#03a9f4;
    }
    .section1.add_new_function > div{
        padding:0;
    }
    .section1.add_new_function_title div{
        padding:0 !important;
    }
    .section1.add_new_function_title a{
        font-size:14px;
        text-align:left;
    }
    .temp .title{
        font-weight: bold;
    }
    .temp .value.green{
        color:#1bd862;
    }
    .temp .value{
        font-weight: normal;
    }
    .temp .key-label{
        font-weight:bold;
        color: #222;
        text-transform: uppercase;
    }
    .score10 .nps-item{
        width:9.090909091%;
        float:left;
        padding: 0 1px;
    }
    .score5 .nps-item,  .score6 .nps-item{
        width:20%;
        float:left;
    }
    .nps-item-dv{
        /* border: solid 1px #ddd; */
        /* border-radius: 4px; */
        padding:5px 0 0 0;
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
    .overflow_dv {
        width: 100%;
        overflow: visible;
        max-height: 300px;
        overflow-y:auto;
     /* min-height: 80px; */
    }
    .export button{
        float: right;
        border: none;
        color: white;
        border-radius: 4px;
        background-color: #03a9f4;
        height: 40px;
    }
    .green{
        color:#25d96a !important;
    }
</style>

<div class="surveyView" ng-controller="pesquisaquestionCtrl">
	<form id="saveform1">
		<!-- <h2 class="new_heading_dv">
			Nova Pesquisa
		</h2> -->
		<div class="button_sets backlink inline">
			<a href="<?php echo base_url()?>pesquisas" class="startappraisal "><i class="fa fa-reply"></i> Pesquisas</a>
		</div>

		<div class="section1 add_new_function survey_report survey_menus" >
			<div id="elofy-overlay-loader" ng-show="contentLoading > 0" >
                <img src="<?php echo base_url()?>assets/portal/img/preloader_2.gif" alt="close"/>
			</div>
			<div class="add_new_function_title" style="padding:0;border-bottom: 1px solid #ddd">
				<div class="col-sm-11" style="border-right:solid 1px #ddd; padding-top:18px; padding-bottom:18px;">
					<a href="javascript:void(0)" >
						<div class="col-sm-12" style="height:30px; display:table">
							<span style="display:table-cell; vertical-align:middle; color:#222;">Relatório de Pesquisa - {{info.nome_pesquisa}}</span> 
						</div>
						<div class="clearfix"></div>
					</a>
				</div>
				<div class="col-sm-1 text-right" style=" padding-top:18px; padding-bottom:18px;">
						<div class="info-hover"><i class="fa fa-question-circle"></i>
							<div class="survey-info">
								<ul>
									<li>
										<strong>Tempo restante: </strong>
										<label class="value green">{{info.remain_time < 0?'':info.remain_time}}</label>
									</li>
									<li>
										<strong>Criado por:</strong>
										<label class="value">{{info.nome_usuario}}</label>
									</li>
									<li>
										<strong>Tipo:</strong>
										<label ng-if="info.id_tipo_pesquisa == 0">Enquete</label>
										<label class="valu" ng-if="info.id_tipo_pesquisa == 1">Clima Organizacional</label>
										<label class="value" ng-if="info.id_tipo_pesquisa == 2">Período de Experiência</label>
										<label class="value" ng-if="info.id_tipo_pesquisa == 3">Pesquisa</label>
										<label class="value" ng-if="info.id_tipo_pesquisa == 4">Outro</label>
										<div class="clearfix"></div>
									</li>
									<li>
										<strong>Anonima: </strong>
										<label class="value" ng-if="info.anonima == 0">Nao</label>
										<label class="value" ng-if="info.anonima == 1">Sim</label>
									</li>
									<li>
										<strong>Ínicio:</strong>
										<label class="value">{{info.data_ini}}</strong>
									</li>
									<li>
										<strong>Fim:</strong>
										<label class="value">{{info.data_fim=='00/00/0000'?'':info.data_fim}}</label>
									</li>
									<li>
										<div id="chart-pie"></div>
									</li>
								</ul>
							</div>
						</div>
				</div>
				<div class="clearfix"></div>
			</div>

			<div style="padding-bottom: 24px;">
				<div style="width: calc(100% - 220px); display: inline-block; float:left;">
					<div class="form_add filter_form_view">
						<input type="hidden" id="id_pesquisa1" class="form-control" name="id_pesquisa" ng-model="pesquisa.id_pesquisa" value="<?php echo $this->session->userdata('id_pesquisa'); ?>"/>

						
						<div class="row" style="margin-bottom:10px;">
							<div class="col-sm-4">
								<label class="input-label"  style="float:left; width:auto">Tags: </label>
								<div class="model_bod" style="display:inline-block; vertical-align:top; margin:0 10px; height:0; float:left" >
									<div class="model_ch">
										<div class="model_che">
											<input type="checkbox" id="chk_all_tag" name="chk_all_tag" value="1">
											<label for="chk_all_tag" class="low-input-label">Todos</label>
										</div>
									</div>
								</div> 
								<div class="clearfix"></div>
								<div class="filters_view">
									<select id="selectd_tags" name="selectd_tags[]" multiple="multiple" class="selectd_tags" data-placeholder="Tag" ng-model="selectd_tags">
										<option ng-repeat="tag in tags" value="{{tag.id}}">{{tag.name}}</option>
									</select>
								</div>
							</div>
							<div class="col-sm-4">
		                        <label class="input-label"  style="float:left; width:auto">Tempo de Empresa: </label>
		                        <div class="clearfix"></div>
		                        <div class="filters_view">
		                            <select id="tempo_empresa" name="selected_tempo_empresa" class="selectd_empresa" data-placeholder="Escolha o tempo" ng-model="key_selected_tempo_empresa">
										 <option value="">Elegibilidade</option>
		                                 <option value="0-3">Até 3 meses</option>
		                                 <option value="3-6">Entre 3 e 6 meses</option>
		                                 <option value="6-12">Entre 6 meses e 1 ano</option>
		                                 <option value="12-24">Entre 1 e 2 anos</option>
		                                 <option value="2-*">Acima de 2 anos</option>
		                            </select>
		                        </div>	 
		                    </div>
							
							<div class="col-sm-4">
								<label class="input-label"  style="float:left; width:auto">Categorias: </label>
								<div class="model_bod" style="display:inline-block; vertical-align:top; margin:0 10px; height:0; float:left" >
									<div class="model_ch">
										<div class="model_che">
											<input type="checkbox" id="chk_all_cat" name="chk_all_cat" value="1">
											<label for="chk_all_cat" class="low-input-label">Todos</label>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="filters_view">
									<select id="selectd_cat" name="selectd_cat[]" multiple="multiple" class="selectd_cat" data-placeholder="Categorias" ng-model="keySelectCat">
										 <option ng-repeat="category in categories" value="{{category.id_categoria_pergunta}}">{{category.nome_categoria}}</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row" style="margin-bottom:10px;">
							<div class="col-sm-4" style="padding-top: 10px">
								<label class="input-label"  style="float:left; width:auto">Times: </label>
								<div class="model_bod" style="display:inline-block; vertical-align:top; margin:0 10px; height:0; float:left" >
									<div class="model_ch">
										<div class="model_che">
											<input type="checkbox" id="chk_all_team" name="chk_all_team" value="1">
											<label class="all-selector" for="chk_all_team" class="low-input-label">Todos</label>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="filters_view">
									<select id="selectd_team1" name="selectd_team1[]" multiple="multiple" class="selectd_team1" data-placeholder="Time" ng-model="selectd_team1">
										<option ng-repeat="team in teams" value="{{team.id}}">{{team.name}}</option>
									</select>
								</div>
							</div>
							<div class="col-sm-4"style="padding-top: 10px">
								<label class="input-label"  style="float:left; width:auto">Gestor: </label>
								<div class="model_bod" style="display:inline-block; vertical-align:top; margin:0 10px; height:0; float:left" >
									<div class="model_ch">
										<div class="model_che">
											<input type="checkbox" id="chk_all_gestor" name="chk_all_gestor" value="1">
											<label for="chk_all_gestor" class="low-input-label">Todos</label>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="filters_view">
									<select id="selectd_gestor" name="selectd_gestor[]" multiple="multiple" class="selectd_gestor" data-placeholder="Gestor" ng-model="keySelectGestor">
										 <option ng-repeat="gestor in gestors" value="{{gestor.id_gestor}}">{{gestor.nome_gestor}}</option>
									</select>
								</div>
							</div>
							<div class="col-sm-4"style="padding-top: 10px">
								<label class="input-label"  style="float:left; width:auto">Pergunta: </label>
								<div class="clearfix"></div>
								<div class="filters_view">
									<select id="id_pergunta" name="id_pergunta" class="id_pergunta" data-placeholder="Pergunta" ng-model="keySelectPergunta">
										<option value="" selected>Todos </option>
										<option ng-repeat="que in perguntas" value="{{que.id_pergunta}}">{{que.pergunta}}</option>
									</select>
								</div>
							</div>
						</div>		
						<div class="row" ng-show="typetab == 5">
							<div class="col-sm-4"style="padding-top: 10px">
								<label class="input-label"  style="float:left; width:auto">Tipo de Matriz: </label>
								<div class="clearfix"></div>
								<div class="filters_view">
									<select id="tipo_matriz" name="tipo_matriz" class="id_pergunta" data-placeholder="Tipo" ng-model="matrix.selectedType">
										<option value="question_gestor">Perguntas por Gestor</option>
										<option value="question_team">Perguntas por Time</option>
										<option value="category_gestor">Categoria por Gestor</option>
										<option value="category_team">Categoria por Time</option>
									</select>
								</div>
							</div>

							<div class="col-sm-4" style="padding-top: 10px">
								<label class="input-label"  style="float:left; width:auto">Tipo de valor: </label>
								<div class="clearfix"></div>
								<div class="filters_view">
									    <input class="styled-checkbox" type="radio" id="modamedia1" ng-model="matrix.modaOuMedia" value="moda" ng-click="matrix.precision = 0"><label for="modamedia1">Moda</label>
									    <input class="styled-checkbox" type="radio" id="modamedia2" ng-model="matrix.modaOuMedia" value="media" ng-click="matrix.precision = 2"><label for="modamedia2">Média</label>
								</div>
							</div>


						</div>
					</div>
				</div>	
				<div style="margin-top: 20px; width: 220px; display: inline-block;">
                    <div class="col-sm-12 clr_filters">
						<button type="submit" ng-click="filterbottomsection()" class="apply_filter"><i class="entypo-search"></i> Filtrar</button>
						<a type="submit" ng-click="cleanFilters()" class="clean_filter">Limpar filtros</a>
						<a type="submit" ng-click="exportCSV()" ng-disabled="resposta.length == 0" class="clean_filter">Exportar CSV</a>
					</div>
				</div>
		
				<div class="clearfix"></div>
                <h2 class="new_heading_dv" align="center" style="margin-top: 2%">
                <div class="button_sets">
                    <a href="javascript:void(0)" class="" ng-class="{'active_bitton_links_dv': typetab == '1' || !typetab}" ng-click="escala5Type()">Favorabilidade</a>
                    <a href="javascript:void(0)" class="additional actives" ng-class="{'active_bitton_links_dv': typetab == '5'}" ng-click="matriz()">Matriz</a>
                    <a href="javascript:void(0)" class="additional actives" ng-class="{'active_bitton_links_dv': typetab == '2'}" ng-click="escalaqType()">Qualitativa</a>
                    <a href="javascript:void(0)" class="additional meustab" ng-class="{'active_bitton_links_dv': typetab == '3'}" ng-click="escalaOType()">Objetivas</a>
                    <a href="javascript:void(0)" class="additional meustab" ng-class="{'active_bitton_links_dv': typetab == '4'}" ng-click="adesao()">Adesão</a>
                    
                    <div class="okr_animation"></div>
                </div>
                </h2>
            <div class="form_add_row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-3" ng-if="!typetab || typetab == 1">
							<div class="model_bod" style="display:inline-block; vertical-align:top; height:0; float:left" >
								<div class="model_ch row">
									<div class="model_che">
										<input type="checkbox" id="group_cat" name="group_cat" ng-model="group_cat" ng-click='setgroupby()' value="1" >
										<label style="" for="group_cat" class="low-input-label"> Agrupar por categorias</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
				<div class="clearfix"></div>
                <div ng-if="!typetab || typetab == 1">
                	<div ng-if="!global5 && !glabal10" style="text-align: center;">Nenhum dado disponível</div>
    				<div class="chart10">
						<div ng-if="glabal10"> 
							<div class="col-sm-12" style="position: absolute;">
								<div class="row" style="width: 44%; float:right; margin-right: 4%;">
									<div class="red_percentage" style="text-align: center; float:left; display:inline-block; width:{{glabal10.r0_graphic_percent + glabal10.r1_graphic_percent + glabal10.r2_graphic_percent + glabal10.r3_graphic_percent + glabal10.r4_graphic_percent + glabal10.r5_graphic_percent + glabal10.r6_graphic_percent}}%">{{glabal10.r0_percent + glabal10.r1_percent + glabal10.r2_percent + glabal10.r3_percent + glabal10.r4_percent + glabal10.r5_percent + glabal10.r6_percent | number : 0}}%</div>
									<div class="yellow_percentage" style="text-align: center; float:left; display:inline-block; width:{{glabal10.r7_graphic_percent + glabal10.r8_graphic_percent }}%">{{glabal10.r7_percent + glabal10.r8_percent| number : 0}}%</div>
									<div class="green_percentage" style="text-align: center; float:left; display:inline-block; width:{{glabal10.r9_graphic_percent + glabal10.r10_graphic_percent }}%">{{glabal10.r9_percent + glabal10.r10_percent| number : 0}}%</div>
								</div>
							</div>
    						<div class="cat-nm-dv" ng-class="{'average_grouped':group_by}">Média acumulada em escala de 10</div>
	    					<div class="form_add_row">
	    						<div class="col-sm-6" style="padding-top:5px"></div>
	    						<div class="col-sm-6">
	    							<div class="text-center col-sm-11 score10">
	    								<div class="nps-item text-center" style="width:{{glabal10.r0_graphic_percent}}%;max-width: 50%">
	    									<div class="nps-item-dv">
	    										<div>{{glabal10.r0}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width:{{glabal10.r1_graphic_percent}}%;max-width: 50%">
	    									<div class="nps-item-dv">
	    										<div>{{glabal10.r1}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width:{{glabal10.r2_graphic_percent}}%;max-width: 50%">
	    									<div class="nps-item-dv">
	    										<div>{{glabal10.r2}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width:{{glabal10.r3_graphic_percent}}%;max-width: 50%">
	    									<div class="nps-item-dv">
	    										<div>{{glabal10.r3}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width:{{glabal10.r4_graphic_percent}}%;max-width: 50%">
	    									<div class="nps-item-dv">
	    										<div>{{glabal10.r4}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width:{{glabal10.r5_graphic_percent}}%;max-width: 50%">
	    									<div class="nps-item-dv">
	    										<div>{{glabal10.r5}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width:{{glabal10.r6_graphic_percent}}%;max-width: 50%">
	    									<div class="nps-item-dv">
	    										<div>{{glabal10.r6}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width:{{glabal10.r7_graphic_percent}}%;max-width: 50%">
	    									<div class="nps-item-dv">
	    										<div>{{glabal10.r7}}</div>
	    									</div>
	    								</div>
	    								
	    								<div class="nps-item text-center" style="width:{{glabal10.r8_graphic_percent}}%;max-width: 50%">
	    									<div class="nps-item-dv">
	    										<div>{{glabal10.r8}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width:{{glabal10.r9_graphic_percent}}%;max-width: 50%">
	    									<div class="nps-item-dv">
	    										<div>{{glabal10.r9}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width:{{glabal10.r10_graphic_percent}}%;max-width: 50%">
	    									<div class="nps-item-dv">
	    										<div>{{glabal10.r10}}</div>
	    									</div>
	    								</div>
	    							</div>
	    							<div class="col-sm-1 green text-center" style="margin-top:5px; left: 5px;"><div class="row">{{glabal10.total_count}}</div></div>
	    						</div>
	    						<div class="clearfix"></div>
	    					</div>
    					</div>

    					<div  ng-repeat="scores in scores10.non_categorywise | filter : customfiltertext || undefined" ng-if="!group_by">
    						<div class="cat-nm-dv">{{scores.data.name}}</div>
    						<div class="form_add_row pergunta_header">
	    						<div class="col-sm-6">Pergunta</div>
	    						<div class="col-sm-6">Resultados</div>
	    					</div>
	    					<div class="" ng-repeat="score in scores.questions" >
								<div class="col-sm-12">
									<div class="row" style="width: 44%; float:right; margin-right: 4%;">
    									<div class="red_percentage" style="text-align: center; float:left; display:inline-block; width:{{score.r0_graphic_percent + score.r1_graphic_percent + score.r2_graphic_percent + score.r3_graphic_percent + score.r4_graphic_percent + score.r5_graphic_percent + score.r6_graphic_percent}}%">{{score.r0_percent + score.r1_percent + score.r2_percent + score.r3_percent + score.r4_percent + score.r5_percent + score.r6_percent | number : 0}}%</div>
    									<div class="yellow_percentage" style="text-align: center; float:left; display:inline-block; width:{{score.r7_graphic_percent + score.r8_graphic_percent }}%">{{score.r7_percent + score.r8_percent| number : 0}}%</div>
    									<div class="green_percentage" style="text-align: center; float:left; display:inline-block; width:{{score.r9_graphic_percent + score.r10_graphic_percent }}%">{{score.r9_percent + score.r10_percent| number : 0}}%</div>
									</div>
								</div>

	    						<div class="col-sm-6" style="padding-top:5px;">{{score.pergunta}}</div>
	    						<div class="col-sm-6">
	    							<div class="text-center col-sm-11 score10">

	    								<div class="nps-item text-center" style="width:{{score.r0_graphic_percent}}%;max-width: 50%">
	    									<div class="nps-item-dv">
	    										<div>{{score.r0}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width:{{score.r1_graphic_percent}}%;max-width: 50%">
	    									<div class="nps-item-dv">
	    										<div>{{score.r1}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width:{{score.r2_graphic_percent}}%;max-width: 50%">
	    									<div class="nps-item-dv">
	    										<div>{{score.r2}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width:{{score.r3_graphic_percent}}%;max-width: 50%">
	    									<div class="nps-item-dv">
	    										<div>{{score.r3}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width:{{score.r4_graphic_percent}}%;max-width: 50%">
	    									<div class="nps-item-dv">
	    										<div>{{score.r4}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width:{{score.r5_graphic_percent}}%;max-width: 50%">
	    									<div class="nps-item-dv">
	    										<div>{{score.r5}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width:{{score.r6_graphic_percent}}%;max-width: 50%">
	    									<div class="nps-item-dv">
	    										<div>{{score.r6}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width:{{score.r7_graphic_percent}}%;max-width: 50%">
	    									<div class="nps-item-dv">
	    										<div>{{score.r7}}</div>
	    									</div>
	    								</div>
	    								
	    								<div class="nps-item text-center" style="width:{{score.r8_graphic_percent}}%;max-width: 50%">
	    									<div class="nps-item-dv">
	    										<div>{{score.r8}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width:{{score.r9_graphic_percent}}%;max-width: 50%">
	    									<div class="nps-item-dv">
	    										<div>{{score.r9}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width:{{score.r10_graphic_percent}}%;max-width: 50%">
	    									<div class="nps-item-dv">
	    										<div>{{score.r10}}</div>
	    									</div>
	    								</div>
	    							</div>
	    							<div class="col-sm-1 green text-center" style="margin-top:5px; left: 5px;"><div class="row">{{score.total_count}}</div></div>
	    						</div>
	    						<div class="clearfix"></div>
	    					</div>
    					</div>
    					<div class="form_add_row categorywise" ng-repeat="category in scores10.categorywise | filter : customfiltertext || undefined" ng-if="group_by" >
    						
							<div class="col-sm-12">
								<div class="row" style="width: 44%; float:right; margin-right: 4%;">
									<div class="red_percentage" style="text-align: center; float:left; display:inline-block; width:{{category.r0_graphic_percent + category.r1_graphic_percent + category.r2_graphic_percent + category.r3_graphic_percent + category.r4_graphic_percent + category.r5_graphic_percent + category.r6_graphic_percent}}%">{{category.r0_percent + category.r1_percent + category.r2_percent + category.r3_percent + category.r4_percent + category.r5_percent + category.r6_percent | number : 0}}%</div>
									<div class="yellow_percentage" style="text-align: center; float:left; display:inline-block; width:{{category.r7_graphic_percent + category.r8_graphic_percent }}%">{{category.r7_percent + category.r8_percent| number : 0}}%</div>
									<div class="green_percentage" style="text-align: center; float:left; display:inline-block; width:{{category.r9_graphic_percent + category.r10_graphic_percent }}%">{{category.r9_percent + category.r10_percent| number : 0}}%</div>
								</div>
							</div>
    						<div class="col-sm-6 font-600" style="padding-top:5px; font-size:17px;">{{category.data.name}}</div>
    						<div class="col-sm-6">
    							<div class="text-center col-sm-11 score10">
    								<div class="nps-item text-center" style="width:{{category.r0_graphic_percent}}%;max-width: 50%">
    									<div class="nps-item-dv">
    										<div>{{category.r0}}</div>
    									</div>
    								</div>
    								<div class="nps-item text-center" style="width:{{category.r1_graphic_percent}}%;max-width: 50%">
    									<div class="nps-item-dv">
    										<div>{{category.r1}}</div>
    									</div>
    								</div>
    								<div class="nps-item text-center" style="width:{{category.r2_graphic_percent}}%;max-width: 50%">
    									<div class="nps-item-dv">
    										<div>{{category.r2}}</div>
    									</div>
    								</div>
    								<div class="nps-item text-center" style="width:{{category.r3_graphic_percent}}%;max-width: 50%">
    									<div class="nps-item-dv">
    										<div>{{category.r3}}</div>
    									</div>
    								</div>
    								<div class="nps-item text-center" style="width:{{category.r4_graphic_percent}}%;max-width: 50%">
    									<div class="nps-item-dv">
    										<div>{{category.r4}}</div>
    									</div>
    								</div>
    								<div class="nps-item text-center" style="width:{{category.r5_graphic_percent}}%;max-width: 50%">
    									<div class="nps-item-dv">
    										<div>{{category.r5}}</div>
    									</div>
    								</div>
    								<div class="nps-item text-center" style="width:{{category.r6_graphic_percent}}%;max-width: 50%">
    									<div class="nps-item-dv">
    										<div>{{category.r6}}</div>
    									</div>
    								</div>
    								<div class="nps-item text-center" style="width:{{category.r7_graphic_percent}}%;max-width: 50%">
    									<div class="nps-item-dv">
    										<div>{{category.r7}}</div>
    									</div>
    								</div>
    								<div class="nps-item text-center" style="width:{{category.r8_graphic_percent}}%;max-width: 50%">
    									<div class="nps-item-dv">
    										<div>{{category.r8}}</div>
    									</div>
    								</div>
    								<div class="nps-item text-center" style="width:{{category.r9_graphic_percent}}%;max-width: 50%">
    									<div class="nps-item-dv">
    										<div>{{category.r9}}</div>
    									</div>
    								</div>
    								<div class="nps-item text-center" style="width:{{category.r10_graphic_percent}}%;max-width: 50%">
    									<div class="nps-item-dv">
    										<div>{{category.r10}}</div>
    									</div>
    								</div>
    							</div>
    							<div class="col-sm-1 green text-center" style="margin-top:5px; left: 5px;"><div class="row">{{category.total_count}}</div></div>
    						</div>
    						<div class="clearfix"></div>
    					</div>
    				</div>
    				<div class="chart5">
    					<div class="clearfix"></div>
						<div ng-if="global5" class="form_add_row categorywise">
							<div class="col-sm-12" style="position: absolute;">
								<div class="row" style="width: 44%; float:right; margin-right: 4%;">
									<div class="red_percentage" style="text-align: center; float:left; display:inline-block; width:{{global5.r0_graphic_percent + global5.r1_graphic_percent + global5.r2_graphic_percent}}%">{{global5.r0_percent + global5.r1_percent + global5.r2_percent | number : 0}}%</div>
									<div class="yellow_percentage" style="text-align: center; float:left; display:inline-block; width:{{global5.r3_graphic_percent }}%">{{global5.r3_percent | number : 0}}%</div>
									<div class="green_percentage" style="text-align: center; float:left; display:inline-block; width:{{global5.r4_graphic_percent + global5.r5_graphic_percent}}%">{{global5.r4_percent + global5.r5_percent | number : 0}}%</div>
								</div>
							</div>

    						<div class="cat-nm-dv" ng-class="{'average_grouped':group_by}">Média acumulada em escala de 5</div>
    						<div class="col-sm-6 font-600" style="padding-top:5px"></div>
    						<div class="col-sm-6">
    							<div class="text-center col-sm-11 score6">

    								<div class="nps-item text-center" style="width: {{global5.r0_graphic_percent}}%">
    									<div class="nps-item-dv">
    										<div>{{global5.r0}}</div>
    									</div>
    								</div>
    								<div class="nps-item text-center" style="width: {{global5.r1_graphic_percent}}%">
    									<div class="nps-item-dv">
    										<div>{{global5.r1}}</div>
    									</div>
    								</div>
    								<div class="nps-item text-center" style="width: {{global5.r2_graphic_percent}}%">
    									<div class="nps-item-dv">
    										<div>{{global5.r2}}</div>
    									</div>
    								</div>
    								<div class="nps-item text-center" style="width: {{global5.r3_graphic_percent}}%">
    									<div class="nps-item-dv">
    										<div>{{global5.r3}}</div>
    									</div>
    								</div>
    								<div class="nps-item text-center" style="width: {{global5.r4_graphic_percent}}%">
    									<div class="nps-item-dv">
    										<div>{{global5.r4}}</div>
    									</div>
    								</div>
    								<div class="nps-item text-center" style="width: {{global5.r5_graphic_percent}}%">
    									<div class="nps-item-dv">
    										<div>{{global5.r5}}</div>
    									</div>
    								</div>
    							</div>
    							<div class="col-sm-1 green text-center" style="margin-top:5px; left: 5px;"><div class="row">{{global5.total_count}}</div></div>
    						</div>
    						<div class="clearfix"></div>
    					</div>



    					<div  ng-repeat="scores in scores5.non_categorywise | filter : customfiltertext || undefined" ng-if="!group_by">
    						

    						<div class="cat-nm-dv" ng-class="{'average_grouped':group_by}">{{scores.data.name}}</div>

    						<div class="form_add_row pergunta_header">
	    						<div class="col-sm-6">Pergunta</div>
	    						<div class="col-sm-6">Resultados</div>
	    					</div>

	    					<div class="" ng-repeat="score in scores.questions">
								
								<div class="col-sm-12">
									<div class="row" style="width: 44%; float:right; margin-right: 4%;">
										<div class="red_percentage" style="text-align: center; float:left; display:inline-block; width:{{score.r0_graphic_percent + score.r1_graphic_percent + score.r2_graphic_percent}}%">{{score.r0_percent + score.r1_percent + score.r2_percent | number : 0}}%</div>
										<div class="yellow_percentage" style="text-align: center; float:left; display:inline-block; width:{{score.r3_graphic_percent }}%">{{score.r3_percent | number : 0}}%</div>
										<div class="green_percentage" style="text-align: center; float:left; display:inline-block; width:{{score.r4_graphic_percent + score.r5_graphic_percent}}%">{{score.r4_percent + score.r5_percent | number : 0}}%</div>
									</div>
								</div>

	    						<div class="col-sm-6" style="padding-top:5px">{{score.pergunta}}</div>
	    						<div class="col-sm-6">
	    							<div class="text-center col-sm-11 score6">
	    								<div class="nps-item text-center" style="width: {{score.r0_graphic_percent}}%">
	    									<div class="nps-item-dv">
	    										<div>{{score.r0}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width: {{score.r1_graphic_percent}}%">
	    									<div class="nps-item-dv">
	    										<div>{{score.r1}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width: {{score.r2_graphic_percent}}%">
	    									<div class="nps-item-dv">
	    										<div>{{score.r2}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width: {{score.r3_graphic_percent}}%">
	    									<div class="nps-item-dv">
	    										<div>{{score.r3}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width: {{score.r4_graphic_percent}}%">
	    									<div class="nps-item-dv">
	    										<div>{{score.r4}}</div>
	    									</div>
	    								</div>
	    								<div class="nps-item text-center" style="width: {{score.r5_graphic_percent}}%">
	    									<div class="nps-item-dv">
	    										<div>{{score.r5}}</div>
	    									</div>
	    								</div>
	    							</div>
	    							<div class="col-sm-1 green text-center" style="margin-top:5px;"><div class="row">{{score.total_count}}</div></div>
	    						</div>
	    						<div class="clearfix"></div>
	    					</div>
    					</div>
    					<div class="form_add_row categorywise" ng-repeat="category in scores5.categorywise" ng-if="group_by" >
							<div class="col-sm-12">
								<div class="row" style="width: 44%; float:right; margin-right: 4%;">
									<div class="red_percentage" style="text-align: center; float:left; display:inline-block; width:{{category.r0_graphic_percent + category.r1_graphic_percent + category.r2_graphic_percent}}%">{{category.r0_percent + category.r1_percent + category.r2_percent| number : 0}}%</div>
									<div class="yellow_percentage" style="text-align: center; float:left; display:inline-block; width:{{category.r3_graphic_percent }}%">{{category.r3_percent | number : 0}}%</div>
									<div class="greenish_percentage" style="text-align: center; float:left; display:inline-block; width:{{category.r4_graphic_percent + category.r5_graphic_percent}}%">{{category.r4_percent + category.r5_percent| number : 0}}%</div>
								</div>
							</div>
    						<div class="col-sm-6 font-600" style="padding-top:5px; font-size:17px;">{{category.data.name}}</div>
    						<div class="col-sm-6">
    							<div class="text-center col-sm-11 score6">
    								<div class="nps-item text-center" style="width: {{category.r0_graphic_percent}}%">
    									<div class="nps-item-dv">
    										<div>{{category.r0}}</div>
    									</div>
    								</div>
    								<div class="nps-item text-center" style="width: {{category.r1_graphic_percent}}%">
    									<div class="nps-item-dv">
    										<div>{{category.r1}}</div>
    									</div>
    								</div>
    								<div class="nps-item text-center" style="width: {{category.r2_graphic_percent}}%">
    									<div class="nps-item-dv">
    										<div>{{category.r2}}</div>
    									</div>
    								</div>
    								<div class="nps-item text-center" style="width: {{category.r3_graphic_percent}}%">
    									<div class="nps-item-dv">
    										<div>{{category.r3}}</div>
    									</div>
    								</div>
    								<div class="nps-item text-center" style="width: {{category.r4_graphic_percent}}%">
    									<div class="nps-item-dv">
    										<div>{{category.r4}}</div>
    									</div>
    								</div>
    								<div class="nps-item text-center" style="width: {{category.r5_graphic_percent}}%">
    									<div class="nps-item-dv">
    										<div>{{category.r5}}</div>
    									</div>
    								</div>
    							</div>
    							<div class="col-sm-1 green text-center" style="margin-top:5px; left: 5px;"><div class="row">{{category.total_count}}</div></div>
    						</div>
    						<div class="clearfix"></div>
    					</div>
    				</div>
                </div>
                <div ng-if="typetab == 2">
                    <div class="col-sm-12">
                            <div class="" ng-repeat="(key, categoria) in cat_respostas">
                            		<div class="" style="margin-bottom:5px;">
	                                    <span style="text-align:left; font-weight:bold">{{key}}</span>
	                                </div>
	                                <div class="row" style="border-bottom: solid 1px #e0e0e0; padding-left: 15px; padding-right: 15px; margin-bottom: 6px;">
		                                <div class="col-sm-6">
		                                    <span style="text-align:left; text-transform: uppercase">Pergunta</span>
		                                </div>
		                                <div class="col-sm-6">
		                                    <span style="text-align:left; text-transform: uppercase">Resposta</span>
		                                </div>
	                    				<div class="clearfix"></div>
	                    			</div>

	                            <div class="" ng-repeat="(key2, pergunta) in categoria" style="margin-bottom: 20px;">
	                                <div class="col-sm-6">
	                                    <span style="text-align:left">{{key2}}</span>
	                                </div>
	                                <div class="col-sm-6">
	                                    <div ng-repeat="resposta in pergunta" style="text-align:left;    margin-bottom: 8px;
    padding-bottom: 6px;
    border-bottom: 1px solid #dedede;">
	                                    	<span>{{resposta.comentario}}</span>
	                                    	<div class="clearfix"></div>
	                                    </div>
	                                </div>
                    				<div class="clearfix separation"></div>
	                            </div>
                            </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div ng-if="typetab == 3">
                    <div class="col-sm-12">

                        <div class="" ng-repeat="(key, categoria) in cat_respostasObjetivas">
                    		<div class="" style="margin-bottom:5px;">
                                <span style="text-align:left; font-weight:bold">{{key}}</span>
                            </div>
                            <div class="row" style="border-bottom: solid 1px #e0e0e0; padding-left: 15px; padding-right: 15px; margin-bottom: 6px;">
                                <div class="col-sm-6">
                                    <span style="text-align:left; text-transform: uppercase">Pergunta</span>
                                </div>
                                <div class="col-sm-4">
                                    <span style="text-align:left; text-transform: uppercase">Resposta</span>
                                </div>
                                <div class="col-sm-2">
                                    <span style="text-align:left; text-transform: uppercase">Nº de Respostas</span>
                                </div>
                				<div class="clearfix"></div>
                			</div>

                            <div class="" ng-repeat="respostaObjetiva in categoria" style="margin-bottom: 10px;">
                                <div class="col-sm-6">
                                    <span style="text-align:left">{{respostaObjetiva.pergunta}}</span>
                                </div>
                                <div class="col-sm-4">
                                    <span style="text-align:left">{{respostaObjetiva.posta==null?'':respostaObjetiva.posta}}</span>
                                </div>
                                <div class="col-sm-2">
                                    <span style="text-align:left">{{respostaObjetiva.quantidade}}</span>
                                </div>
                				<div class="clearfix"></div>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div ng-if="typetab == 4">
                    <div class="col-sm-12">
                    	<table style="width:100%; margin-bottom: -18px;" class="table adesao_table">
                    		<tr>
                    			<th>Times</th>
                    			<th style="text-align:right;">% Participação</th>
                    			<th style="text-align:right;">Nº de respostas<span class="gray_opacity"> / Nº de respondentes</span></th>
                    		</tr>
                    		<tr ng-repeat="time in listaAdesao">
                    			<td>{{time.nome_time}}</td>
                    			<td style="width:15%; text-align:right;"><span ng-if="time.respondidos=='n/d'"><div class="hide over_baloon">Para times com menos que 3 integrantes não apresentamos número para preservar o anonimato</div><i class="fa fa-exclamation-circle"></i></span>{{time.percentage}}</td>
                    			<td style="width:40%; text-align:right;" ng-if="time.respondidos!='n/d'">{{time.respondidos}}<span class="gray_opacity"> / {{time.total}}</span></td>
                    			<td style="width:40%; text-align:right;" ng-if="time.respondidos=='n/d'"><div class="hide over_baloon">Para times com menos que 3 integrantes não apresentamos número de respostas para preservar o anonimato</div><i class="fa fa-exclamation-circle"></i><span class="gray_opacity">{{time.total}}</span></td>
                    		</tr>

                    	</table>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div ng-if="typetab == 5">
                    <div class="col-sm-12">
                    	<pre style="display:none;">{{matrix | json}}</pre>
                    	<div ng-init="matrix.modaOuMedia = 'moda'; matrix.precision = 0; matrix.selectedType='category_team';"></div>
                    	<div class="clearfix"></div>
                    	<div ng-if="selectedMatrixIsEmpty()" style="padding: 20px; text-align: center;">Dados indisponíveis</div>
                    	<table ng-if="!selectedMatrixIsEmpty()" style="width:40%; margin-bottom: -18px; float:left;" class="table matrix">
                    		<tr>
                    			<th>&nbsp</th>
                    		</tr>
                    		<tr ng-repeat="line in matrix.selectedMatrix.lines">
                    			<td class="lineValue" style="padding: 10px; border-right: 1px solid #dddddd;"><div class="fadeClamp">{{line}}</div><div style="z-index: 1000;" class="overlap">{{line}}</div></td>
                    		</tr>

                    	</table>
                    	<div class="values_table" ng-if="!selectedMatrixIsEmpty()" style="width:60%; margin-bottom: -18px; float:left; overflow-x:scroll;">
                    		<div class="table_shade"></div>
	                    	<table style="min-width:100%; " class="table matrix">
	                    		<tr>
	                    			<th ng-repeat="column in matrix.selectedMatrix.columns">&nbsp<div class="inclined_header">{{column}}</div></th>
	                    		</tr>
	                    		<tr ng-repeat="(key, line) in matrix.selectedMatrix.table">
	                    			<td ng-class="{fixed_little:!$last}" ng-repeat="(k, column) in line"><div ng-class="{ redcell:column[matrix.modaOuMedia]<2, redishcell:column[matrix.modaOuMedia]==2, yellowcell:column[matrix.modaOuMedia]==3, greenishcell:column[matrix.modaOuMedia]==4, greencell:column[matrix.modaOuMedia]>4 }" style="width: 61px; text-align:center; padding:10px; color:white;">{{column[matrix.modaOuMedia] | number:matrix.precision}}</div></td>
	                    		</tr>
	                    	</table>
	                    </div>
                    </div>
                    <div class="clearfix"></div>
                </div>

			</div>
			<div class="clear_fix"></div>
		</div>
	</form>
</div>
