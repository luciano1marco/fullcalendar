<!DOCTYPE html>
<html lang="pt-br">

<style>
    #meiogeral {
        background-color: #417989cf;
    }
    #meiogeral h4{
        font-weight: bold;
        font-size: 36px;
        font-family: Georgia, 'Times New Roman', Times, serif;
        text-align: center;
        margin-top: 5px;
        color: #fff;
    }
    #datatable{
        background-color: #123F60;
        color:#fff;
    }
    body{
        background-image: url('/fullcalendar/images/sala3.jpg');
        background-size: 100%;
        background-attachment: fixed;
        text-align: center;
        margin: 40px 10px;
		padding: 0;
		font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
		font-size: 14px;
       
    }
    #calendar {
		margin: 0 auto;
	}

</style>
   
<head>
   
    <meta charset="utf-8" />
    <title>Coworking Chalé 10</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/style.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/main.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/font-awesome/css/font-awesome.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/fullcalendar/fullcalendar.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'; ?>">
</head>

<body>
    <br><br><br><br><br><br>

    <!---form para agendar ---->
    <div class="container" id="meiogeral">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="alert notification" style="display: none;">
                    <button class="close" data-close="alert"></button>
                    <p></p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="portlet-body">
                                <!--
                                <div class="table-toolbar">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-primary add_calendar"> AGENDAR
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                                <br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
                                <!-- Modal -->
                                <div id="calendarIO"></div>
                                <div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form class="form-horizontal" method="POST" action="POST" id="form_create">
                                                <input type="hidden" name="calendar_id" value="0">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalLabel">Agendar um Espaço</h4>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                         <div class="alert alert-danger" style="display: none;"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2">Primeiro Nome  </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="nome" class="form-control" placeholder="Nome">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2">Email  </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="email" class="form-control" placeholder="email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="color" class="col-sm-2 control-label">Espaço</label>
                                                        <div class="col-sm-10">
                                                            <select name="mesa" class="form-control" id="espaco">
                                                                <option value="">Selecione um Espaço</option>
                                                                <option value="Mesa 01">Mesa 01</option>
                                                                <option value="Mesa 02">Mesa 02</option>
                                                                <option value="Mesa 03">Mesa 03</option>
                                                                <option value="Mesa 04">Mesa 04</option>
                                                                <option value="Mesa 05">Mesa 05</option>
                                                                <option value="Mesa 06">Mesa 06</option>
                                                                <option value="Mesa 07">Mesa 07</option>
                                                                <option value="Mesa 08">Mesa 08</option>
                                                                <option value="Mesa 09">Mesa 09</option>
                                                                <option value="Mesa 10">Mesa 10</option>
                                                                <option value="Mesa 11">Mesa 11</option>
                                                                <option value="Mesa 12">Mesa 12</option>
                                                                <option value="Mesa 13">Mesa 13</option>
                                                                <option value="Mesa 14">Mesa 14</option>
                                                                <option value="Mesa 15">Mesa 15</option>
                                                                <option value="Mesa 16">Mesa 16</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="form-group">
                                                        <label for="hora" class="col-sm-2 control-label">Horário</label>
                                                        <div class="col-sm-10">
                                                            <select name='hora' class="form-control">
                                                                <option value="">Selecione um Horário</option>
                                                                <option value="9h">9h</option>
                                                                <option value="10h">10h</option>
                                                                <option value="11h">11h</option>
                                                                <option value="12h">12h</option>
                                                                <option value="13h">13h</option>
                                                                <option value="14h">14h</option>
                                                                <option value="15h">15h</option>
                                                                <option value="16h">16h</option>
                                                                <option value="17h">17h</option>
                                                                <option value="18h">18h</option>
                                                                <option value="19h">19h</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="color" class="form-control" readonly>                                              
                                                  <!---
                                                    <div class="form-group">
                                                        <label for="color" class="col-sm-2 control-label">Color</label>
                                                        <div class="col-sm-10">
                                                            <select name="color" class="form-control">
                                                                <option value="">Selecione uma Cor</option>
                                                                <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                                                                <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                                                                <option style="color:#008000;" value="#008000">&#9724; Green</option>                       
                                                                <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                                                                <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                                                                <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                                                            </select>
                                                        </div>
                                                    </div> 
                                                    ---->
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2">Data Inicial</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                                <input type="text" name="start_date" class="form-control" readonly>
                                                                <span class="input-group-addon"><i class="fa fa-calendar font-dark"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2">Data Final</label>
                                                        <div class="col-sm-10">
                                                            <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                                <input type="text" name="end_date" class="form-control" readonly>
                                                                <span class="input-group-addon"><i class="fa fa-calendar font-dark"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <a  href="javascript::void" class="btn btn-secondary" onClick='limpa_campo();' data-dismiss="modal">Cancel</a>
                                                    <!--<a class="btn btn-danger delete_calendar" style="display: none;">Delete</a>
                                                -->
                                                    <button type="reset" class="btn btn-light">Limpar</button> 
                                                    <button type="submit" class="btn btn-success">Enviar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end modal -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!---fim form---->

    <br><br><br>

    <!----form modal mostrar dados ---->
    <div id="modal_mostra" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><b>Dados da Reserva:</b></h4>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Nome </label>
                        <div class="col-sm-10">
                            <input type="text" name="nome" class="form-control" readonly>
                        </div>
                        <label class="control-label col-sm-2" >Email </label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control" readonly>
                        </div>
                        <label class="control-label col-sm-2" >Espaço </label>
                        <div class="col-sm-10">
                            <input type="text" name="mesa" class="form-control" readonly>
                        </div>
                        <label class="control-label col-sm-2" >Horário </label>
                        <div class="col-sm-10">
                            <input type="text" name="hora" class="form-control" readonly>
                        </div>
                        <label class="control-label col-sm-2" >Data</label>
                        <div class="col-sm-10">
                            <input type="text" name="start" class="form-control" readonly>
                        </div>
                       
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- fim modal -->

    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.min.js'; ?>"></script>      
    <script type="text/javascript" src="<?php echo base_url().'assets/js/moment.min.js'; ?>"></script>      
    <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.min.js'; ?>"></script>      
    <script type="text/javascript" src="<?php echo base_url().'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js'; ?>"></script>      
    <script type="text/javascript" src="<?php echo base_url().'assets/plugins/fullcalendar/fullcalendar.js'; ?>"></script>      
    
    <script type="text/javascript">
        var get_data        = '<?php echo $get_data; ?>';
        var backend_url     = '<?php echo base_url(); ?>';

        $(document).ready(function() {
           
            $('.date-picker').datepicker();
            $('#calendarIO').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month'
                    //basicWeek,basicDay --> adicione estes na linha acima para mostrar semana, dia
                },
                defaultDate: moment().format('YYYY-MM-DD'),
                editable: true,
                eventLimit: true, // permitir "mais" link quando muitos eventos
                selectable: true,
                selectHelper: true,
                select: function(start, end) {
                    $('#create_modal input[name=start_date]').val(moment(start).format('YYYY-MM-DD'));
                    $('#create_modal input[name=end_date]').val(moment(end).format('YYYY-MM-DD'));
                    $('#create_modal').modal('show');
                    save();
                    $('#calendarIO').fullCalendar('unselect');
                },
              
                eventClick: function(event, element)
                {
                    mostra(event);
                   // console.log(event);
                },
                events: JSON.parse(get_data)
            });
            $(this).find('input:text').val('');
        });
     
        /*   $(document).on('submit', '#form_create', function(){
            var element = $(this);
            var eventData;
            $.ajax({
                url     : backend_url+'calendar/save',
                type    : element.attr('method'),
                data    : element.serialize(),
                dataType: 'JSON',
                beforeSend: function()
                {
                    element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                    //compara(event); 
                },
                success: function(data)
                {
                    if(data.status)
                    {   
                        eventData = {
                            id          : data.id,
                           // title       : $('#create_modal input[name=title]').val(),
                            nome        : $('#create_modal input[name=nome]').val(),
                            email       : $('#create_modal input[name=email]').val(),
                            mesa        : $('#create_modal select[name=mesa]').val(),
                            hora        : $('#create_modal select[name=hora]').val(),
                            start       : moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                            end         : moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                            color       : seleciona_cor(),
                            //color       : $('#create_modal select[name=color]').val(),
                        };
                        console.log(eventData),
                        $('#calendarIO').fullCalendar('renderEvent', eventData, true); // stick? = true
                        $('#create_modal').modal('hide');
                        element[0].reset();
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                    }
                    else
                    {
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html(data.notif);
                    }
                    element.find('button[type=submit]').html('Submit');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    element.find('button[type=submit]').html('Submit');
                    element.find('.alert').css('display', 'block');
                    element.find('.alert').html('Servidor errado, salve novamente3');
                }         
            });
           
            return false;
        })
        */
        function save() {
            $('#form_create').submit(function(){
                var element = $(this);
                var eventData;
              
                $.ajax({
                    url     : backend_url+'calendar/save',
                    type    : element.attr('method'),
                    data    : element.serialize(),
                    dataType: 'JSON',
                    beforeSend: function()
                    {
                        element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                    },
                    success: function(data)
                    {
                        if(data.status)
                        {   
                            eventData = {
                                id          : data.id,
                                //title       : $('#create_modal input[name=title]').val(),
                                nome        : $('#create_modal input[name=nome]').val(),
                                email       : $('#create_modal input[name=email]').val(),
                                mesa        : $('#create_modal select[name=mesa]').val(),
                                hora        : $('#create_modal select[name=hora]').val(),
                                start       : moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                                end         : moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss'),
                                color       :seleciona_cor(),
                                                                  
                            };
                           
                            $('#calendarIO').fullCalendar('renderEvent', eventData, true); // stick? = true
                            $('#create_modal').modal('hide');
                            element[0].reset();
                            $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                        }
                        else
                        {
                            element.find('.alert').css('display', 'block');
                            element.find('.alert').html(data.notif);
                        }
                        element.find('button[type=submit]').html('Submit');
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        element.find('button[type=submit]').html('Submit');
                        element.find('.alert').html('Por favor, Selecione a data de hoje ou posterior');
                        element.find('.alert').css('display', 'block');
                    }         
                });
                
                return false;
            })
        }
 
        function mostra(event){

           $('#modal_mostra input[name=nome]').val(event.nome);
           $('#modal_mostra input[name=email]').val(event.email);
           $('#modal_mostra input[name=mesa]').val(event.mesa);
           $('#modal_mostra input[name=hora]').val(event.hora);
           $('#modal_mostra input[name=start]').val(moment(event.start).format('DD/MM/YYYY'));
           $('#modal_mostra input[name=color]').val(event.color);
           //console.log(event);
           $("#modal_mostra").modal({
                show: true
           });
            
        }
        
        function limpa_campo(){
            $('#create_modal input[name=nome]').val('');
            $('#create_modal input[name=email]').val('');
            $('#create_modal select[name=mesa]').val('');
            $('#create_modal select[name=hora]').val('');
            $('.alert').remove();
        }

        /* function editDropResize(event) {
            start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if(event.end)  {
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            }else {
                end = start;
            }
            $.ajax({
                url     : backend_url+'calendar/save',
                type    : 'POST',
                data    : 'calendar_id='+event.id+'&title='+event.title+'&start_date='+start+'&end_date='+end,
                dataType: 'JSON',
                beforeSend: function() { },
                success: function(data) {
                    if(data.status)  {   
                        $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html('Data success update');
                    }else {
                        $('.notification').removeClass('alert-primary').addClass('alert-danger').find('p').html('Data cant update');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    $('.notification').removeClass('alert-primary').addClass('alert-danger').find('p').html('Wrong server, please save again');
                }         
            });
            
        }
        */
        
        function deteil(event) {
            $('#create_modal input[name=calendar_id]').val(event.id);
            $('#create_modal input[name=start_date]').val(moment(event.start).format('YYYY-MM-DD'));
            $('#create_modal input[name=end_date]').val(moment(event.end).format('YYYY-MM-DD'));
           // $('#create_modal input[name=title]').val(event.title);
            $('#create_modal input[name=nome]').val(event.nome);
            $('#create_modal input[name=email]').val(event.email);
            $('#create_modal select[name=mesa]').val(event.mesa);
            $('#create_modal select[name=hora]').val(event.hora);
            $('#create_modal input[name=color]').val(event.color);
            $('#create_modal .delete_calendar').show();
            $('#create_modal').modal('show');
        }
       
        /*      
        function editData(event) {
            $('#form_create').submit(function(){
                var element = $(this);
                var eventData;
               
                $.ajax({
                    url     : backend_url+'calendar/save',
                    type    : element.attr('method'),
                    data    : element.serialize(),
                    dataType: 'JSON',
                    beforeSend: function()
                    {
                        element.find('button[type=submit]').html('<i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                    },
                    success: function(data)
                    { 
                        if(data.status) {   
                           // event.title         = $('#create_modal input[name=title]').val();
                            event.nome          = $('#create_modal input[name=nome]').val();
                            event.email         = $('#create_modal input[name=email]').val();
                            event.mesa          = $('#create_modal select[name=mesa]').val();
                            event.hora          = $('#create_modal select[name=hora]').val();
                            event.start         = moment($('#create_modal input[name=start_date]').val()).format('YYYY-MM-DD HH:mm:ss');
                            event.end           = moment($('#create_modal input[name=end_date]').val()).format('YYYY-MM-DD HH:mm:ss');
                            event.color         = $('#create_modal select[name=color]').val();
                            $('#calendarIO').fullCalendar('updateEvent', event);

                            $('#create_modal').modal('hide');
                            element[0].reset();
                            $('#create_modal input[name=calendar_id]').val(0)
                            $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                        }else{
                            element.find('.alert').css('display', 'block');
                            element.find('.alert').html(data.notif);
                        }
                        element.find('button[type=submit]').html('Submit');
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        element.find('button[type=submit]').html('Submit');
                        element.find('.alert').css('display', 'block');
                        element.find('.alert').html('Wrong server, please save again');
                    }         
                });
               
                return false;
            })
        }

        function deleteData(event) {
            $('#create_modal .delete_calendar').click(function(){
                $.ajax({
                    url     : backend_url+'calendar/delete',
                    type    : 'POST',
                    data    : 'id='+event.id,
                    dataType: 'JSON',
                    beforeSend: function()
                    {
                    },
                    success: function(data)
                    {
                        if(data.status)
                        {   
                            $('#calendarIO').fullCalendar('removeEvents',event._id);
                            $('#create_modal').modal('hide');
                            $('#form_create')[0].reset();
                            $('#create_modal input[name=calendar_id]').val(0)
                            $('.notification').removeClass('alert-danger').addClass('alert-primary').find('p').html(data.notif);
                        }
                        else
                        {
                            $('#form_create').find('.alert').css('display', 'block');
                            $('#form_create').find('.alert').html(data.notif);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        $('#form_create').find('.alert').css('display', 'block');
                        $('#form_create').find('.alert').html('Wrong server, please save again');
                    }         
                });
            })
        }
        */
        //---Botão agendar + 
            //$(document).on('click', '.add_calendar', function(){
            //    $('#create_modal input[name=calendar_id]').val(0);
            //    $('#create_modal').modal('show');  
        //})

        function seleciona_cor(){
            $mesa = $('#create_modal select[name=mesa]').val();
           // console.log($mesa);
            switch ($mesa) {
                case 'Mesa 01': $cor = '#ffff2fff'; break;
                case 'Mesa 02': $cor = '#2dff2fff'; break;
                case 'Mesa 03': $cor = '#0e76eaff'; break;
                case 'Mesa 04': $cor = '#e076eaff'; break;
                case 'Mesa 05': $cor = '#e07615ff'; break;
                case 'Mesa 06': $cor = '#e02535ff'; break;
                case 'Mesa 07': $cor = '#488791ff'; break;
                case 'Mesa 08': $cor = '#008000ff'; break;
                case 'Mesa 09': $cor = '#00ffffff'; break;
                case 'Mesa 10': $cor = '#9a84c8ff'; break;
                case 'Mesa 11': $cor = '#ff8080ff'; break;
                case 'Mesa 12': $cor = '#86605fff'; break;
                case 'Mesa 13': $cor = '#3f5f74cc'; break;
                case 'Mesa 14': $cor = '#ffccaaff'; break;
                case 'Mesa 15': $cor = '#619200ff'; break;
                case 'Mesa 16': $cor = '#af148bff'; break;
            default : $cor = '#fff'; 
            }
            //console.log($('#create_modal input[name='+$cor+']').val());
            return $cor;
            //$('#create_modal select[name=hora]').val(),
        } 
          
    </script>

</body>

</html>