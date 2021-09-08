<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width" />
    <meta property="og:title" content="My First Campaign" />
    <meta name="robots" content="noindex,nofollow" />
    <link href="{{url('assets/layout/css/styles.css')}}" rel="stylesheet"/>
    <link href="{{url('/home/wecares/public/assets/email/template-email.css')}}" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic|Ubuntu:400,700,400italic,700italic" rel="stylesheet"/>
</head>

  <body class="main full-padding" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;">
    <table class="wrapper" style="border-collapse: collapse;table-layout: fixed;min-width: 320px;width: 100%;background-color: #ededf1;" cellpadding="0" cellspacing="0" role="presentation"><tbody><tr><td>
      <div role="banner">
        <div class="preheader" style="Margin: 0 auto;max-width: 560px;min-width: 280px; width: 280px;width: calc(28000% - 167440px);">
          <div style="border-collapse: collapse;display: table;width: 100%;">
            <div class="snippet" style="display: table-cell;Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;width: calc(14000% - 78120px);padding: 10px 0 5px 0;color: #7c7e7f;font-family: Ubuntu,sans-serif;">

            </div>
            <div class="webversion" style="display: table-cell;Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;width: calc(14100% - 78680px);padding: 10px 0 5px 0;text-align: right;color: #7c7e7f;font-family: Ubuntu,sans-serif;">

            </div>
          </div>
        </div>

      </div>
      <div>
      <div class="layout one-col fixed-width stack" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #ffffff;">
          <div class="column" style="text-align: left;color: #7c7e7f;font-size: 14px;line-height: 21px;font-family: PT Serif,Georgia,serif;">

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 24px;">
      <div style="mso-line-height-rule: exactly;line-height: 10px;font-size: 1px;">&nbsp;</div>
    </div>

            <div style="Margin-left: 20px;Margin-right: 20px;">
      <div style="mso-line-height-rule: exactly;mso-text-raise: 11px;vertical-align: middle;">
        <h3 style="Margin-top: 0;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #788991;font-size: 16px;line-height: 24px;text-align: center;">WeCares</h3>
        <h1 style="Margin-top: 12px;Margin-bottom: 0;font-style: normal;font-weight: normal;color: #3e4751;font-size: 22px;line-height: 31px;font-family: Ubuntu,sans-serif;text-align: center;">Informações do pedido</h1>
        <p style="Margin-top: 20px;Margin-bottom: 20px;">
            <form name="formProposta" id="formProposta" method="post" enctype="multipart/form-data" action="{{url('proposta')}}">
                <div class="row margin-top-10">
                    <div class="col">
                        <input type="hidden" id="idPrestadores" name="idPrestadores">
                        <label for="paciente" class="text-dark">Nome do paciente</label><br>
                        <input class="form-control" type="text" name="selectPaciente" id="selectPaciente" value="{{$data['paciente']}}" disabled>
                    </div>
                    <br>
                </div>
                <br>
                <div class="row margin-top-10">
                    <div class="col">
                        <label for="paciente" class="text-dark">O paciente é?</label><br>
                        <input class="form-control" type="text" name="pacienteTipo" id="pacienteTipo" value="{{$data['pacienteTipo']}}" disabled>
                    </div>
                </div>
                <br>
                <div class="row margin-top-10">
                    <div class="col">
                        <label for="solicitante" class="text-dark">Nome do solicitante</label><br>
                        <input class="form-control" type="text" name="nomeSolicitante" id="nomeSolicitante" value="{{$data['nomeSolicitante']}}" disabled>
                    </div>
                    <div class="col">
                        <label for="telefone" class="text-dark">Telefone para contato</label><br>
                        <input class="form-control" type="text" name="telefoneSolicitante" id="telefoneSolicitante" value="{{$data['telefoneSolicitante']}}" disabled>
                    </div>
                </div>
                <br>
            </form>
            <center><span>Indicamos que tome todos os cuidados possíveis durante a negociação e prestação do serviço.&nbsp;</span></center>
        </p>
      </div>
    </div>
            <div style="Margin-left: 20px;Margin-right: 20px;">
      <div class="divider" style="display: block;font-size: 2px;line-height: 2px;Margin-left: auto;Margin-right: auto;width: 40px;background-color: #b4b4c4;Margin-bottom: 20px;">&nbsp;</div>
    </div>

            <div style="Margin-left: 20px;Margin-right: 20px;">
      <div style="mso-line-height-rule: exactly;line-height: 5px;font-size: 1px;">&nbsp;</div>
    </div>

            <div style="Margin-left: 20px;Margin-right: 20px;Margin-bottom: 24px;">
      <div class="btn btn--flat btn--large" style="text-align:center;">
    </div>

          </div>
        </div>
      </div>

      <div style="mso-line-height-rule: exactly;line-height: 20px;font-size: 20px;">&nbsp;</div>

      </div>
      <div role="contentinfo">
        <div class="layout email-footer stack" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
          <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;">
            <div class="column wide" style="text-align: left;font-size: 12px;line-height: 19px;color: #7c7e7f;font-family: Ubuntu,sans-serif;Float: left;max-width: 400px;min-width: 320px; width: 320px;width: calc(8000% - 47600px);">
              <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">

                <div style="font-size: 12px;line-height: 19px;margin-bottom: 15px;">
                  <div>Atendimento, WeCares</div>
                </div>
                <div style="font-size: 12px;line-height: 19px;margin-bottom: 15px;Margin-top: 18px;">

                </div>
              </div>
            </div>
            <div class="column narrow" style="text-align: left;font-size: 12px;line-height: 19px;color: #7c7e7f;font-family: Ubuntu,sans-serif;Float: left;max-width: 320px;min-width: 200px; width: 320px;width: calc(72200px - 12000%);">
              <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">

              </div>
            </div>
          </div>
        </div>
        <div class="layout one-col email-footer" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
          <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;">
            <div class="column" style="text-align: left;font-size: 12px;line-height: 19px;color: #7c7e7f;font-family: Ubuntu,sans-serif;">
              <div style="Margin-left: 20px;Margin-right: 20px;Margin-top: 10px;Margin-bottom: 10px;">
                <div style="font-size: 12px;line-height: 19px;margin-bottom: 15px;">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div style="line-height:40px;font-size:40px;" id="footer-spacing">&nbsp;</div>
    </td></tr></tbody></table>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{url('assets/layout/js/solicitacaoServico.js')}}"></script>
    <script src="{{url('assets/layout/js/camposOcultos.js')}}"></script>
    <script src="{{url('assets/layout/js/scripts.js')}}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.4.0/moment.min.js"></script>
</body>
</html>
