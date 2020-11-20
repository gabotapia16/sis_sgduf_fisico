

<!-- INICIO SCRIPT REPRESENTANTE LEGAL -->
<script type="text/javascript">
  $(document).ready(function(){
    //------------------------
      $('#REP_LEGAL').hide();
      $('#REP_LEGAL_TEXTO').hide();
      $('#CORREO_REP_LEGAL').hide();
      $('#TELEFONO_REP_LEGAL').hide();
    //------------------------
    $("#RADIO_REP_S").on( "click", function() {
      $('#REP_LEGAL').show();
      $('#REP_LEGAL_TEXTO').show();
      $('#CORREO_REP_LEGAL').show();
      $('#TELEFONO_REP_LEGAL').show();
     });
    $("#RADIO_REP_N").on( "click", function() {
      $('#REP_LEGAL').hide();
      $('#REP_LEGAL_TEXTO').hide();
      $('#CORREO_REP_LEGAL').hide();
      $('#TELEFONO_REP_LEGAL').hide();
    });
  });
</script>
<!-- FIN SCRIPT REPRESENTANTE LEGAL -->

<!-- INICIO SCRIPT SELECT ESTAPA TRAMITE -->
<script type="text/javascript">
  $(document).ready(function()
    {
      //-----------------------------
       $('#ESTADO_ETAPA1_R').hide();
       $('#NO_OFICIO_PREVENCION').hide();
       $('#FECHA_PREVENCION').hide();
       $('#FECHA_PREVENCION_TEXTO').hide();
       $('#NO_OFICIO_PROCEDENCIA').hide();
       $('#FECHA_PROCEDENCIA').hide();
       $('#FECHA_PROCEDENCIA_TEXTO').hide();
      //-----------------------------
      $('#tabla_etapa_2').hide();
      //-----------------------------

      $('#tabla_etapa_3').hide();
      //-----------------------------

    $('#ETAPA_TRAMITE').on('change', function() {
        if($('#ETAPA_TRAMITE').val() == 1){
           $('#ESTADO_ETAPA1_R').show();
           $('#tabla_etapa_2').hide();
           $('#tabla_etapa_3').hide();
        }
        if($('#ETAPA_TRAMITE').val() == 2){
          //------------E2-----------------
           $('#ESTADO_ETAPA1_R').show();
           $('#tabla_etapa_2').show();

          //-----------------------------

           
        }
        if($('#ETAPA_TRAMITE').val() == 3){
          //------------E3-----------------
           $('#ESTADO_ETAPA1').show();
           $('#tabla_etapa_2').show();
           $('#tabla_etapa_3').show();
          //-----------------------------
        }
      });
 
     });
</script>
<!-- FIN SCRIPT SELECT ESTAPA TRAMITE -->

<!-- INICIO SCRIPT ESTADO ETAPA 1 -->
<script type="text/javascript">
  $(document).ready(function()
    {
      
    $('#ESTADO_ETAPA1').on('change', function() {
        if($('#ESTADO_ETAPA1').val() == 1){
          
        }
        if($('#ESTADO_ETAPA1').val() == 2){
           $('#NO_OFICIO_PREVENCION').show();
           $('#FECHA_PREVENCION_TEXTO').show();
           $('#FECHA_PREVENCION').show();
           //***********************
           $('#NO_OFICIO_PROCEDENCIA').hide();
           $('#FECHA_PROCEDENCIA').hide();
           $('#FECHA_PROCEDENCIA_TEXTO').hide();
           //***********************
        }
        if($('#ESTADO_ETAPA1').val() == 3){
           $('#NO_OFICIO_PROCEDENCIA').show();
           $('#FECHA_PROCEDENCIA_TEXTO').show();
           $('#FECHA_PROCEDENCIA').show();
           //************************
           $('#NO_OFICIO_PREVENCION').hide();
           $('#FECHA_PREVENCION').hide();
           $('#FECHA_PREVENCION_TEXTO').hide();
           //************************

        }
      });
 
     });
</script>
<!-- FIN SCRIPT ESTADO ETAPA 1 -->

<script type="text/javascript">
$(document).ready(function()
    {
      $( '#CHECKBOX_MA_SLD' ).on( 'click', function() {if( $(this).is(':checked') ){$( '#MATERIA_MA_SLD' ).val("1");} else {$( '#MATERIA_MA_SLD' ).val("0");}});
      $( '#CHECKBOX_MA_DUM' ).on( 'click', function() {if( $(this).is(':checked') ){$( '#MATERIA_MA_DUM' ).val("1");} else {$( '#MATERIA_MA_DUM' ).val("0");}});
      $( '#CHECKBOX_MA_PCL' ).on( 'click', function() {if( $(this).is(':checked') ){$( '#MATERIA_MA_PCL' ).val("1");} else {$( '#MATERIA_MA_PCL' ).val("0");}});
      $( '#CHECKBOX_MA_MAM' ).on( 'click', function() {if( $(this).is(':checked') ){$( '#MATERIA_MA_MAM' ).val("1");} else {$( '#MATERIA_MA_MAM' ).val("0");}});
      $( '#CHECKBOX_MA_DEC' ).on( 'click', function() {if( $(this).is(':checked') ){$( '#MATERIA_MA_DEC' ).val("1");} else {$( '#MATERIA_MA_DEC' ).val("0");}});
      $( '#CHECKBOX_MA_COM' ).on( 'click', function() {if( $(this).is(':checked') ){$( '#MATERIA_MA_COM' ).val("1");} else {$( '#MATERIA_MA_COM' ).val("0");}});
      $( '#CHECKBOX_MA_MOV' ).on( 'click', function() {if( $(this).is(':checked') ){$( '#MATERIA_MA_MOV' ).val("1");} else {$( '#MATERIA_MA_MOV' ).val("0");}});
      $( '#CHECKBOX_MA_ADA' ).on( 'click', function() {if( $(this).is(':checked') ){$( '#MATERIA_MA_ADA' ).val("1");} else {$( '#MATERIA_MA_ADA' ).val("0");}});
});
















