<div ng-controller="zapierCtrl" class="zapierView">
    <div>
        <h2>
            Integração Zapier
        </h2>

        <hr>

        <div class="form_add_row">
            <div class="col-sm-12">

                <div class="dblock">
                    <div class="dblock_head">
                        <h2 class="title_heading">Token Zapier</h2>
                        <input class="tokenField" placeholder="Clique em gerar token" value="{{ token }}" type="text" contenteditable="false"/>
                        <button ng-click="generateToken()" class="confirmar">Gerar novo token</button>
                    </div>
                    <div class="dblock_body"><br>
                        <p>O token gerado acima pode ser usado no site do zapier para integrar a outros serviços. <br>Veja mais em <a target="_blank" href="http://zapier.com">zapier.com</a></p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="form_add_row">
            <div class="col-sm-12">
                <div class="dblock">
                    <div class="dblock_head">
                        <h2 class="title_heading">Token API</h2>
                        <div class="col-sm-6">
                            <input class="tokenField" placeholder="Clique em gerar token" value="{{ api_token }}" type="text" contenteditable="false"/>
                        </div>
                        <div class="col-sm-4">
                            <input id="expire_date" type="text" value="{{ expire_date | amUtc | amDateFormat:'DD/MM/YYYY' }}" contenteditable="false">
                        </div>
                        <button ng-click="generateAPIToken()" class="confirmar">Gerar novo token</button>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>