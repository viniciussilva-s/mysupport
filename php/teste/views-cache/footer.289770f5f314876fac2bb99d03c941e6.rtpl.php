<?php if(!class_exists('Rain\Tpl')){exit;}?>  </div><!-- /#right-panel -->

    <!-- Right Panel -->

<script src="../../res/assets/js/vendor/jquery-3.3.1.min.js"></script>
<script src="/res/assets/js/notify/notify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
 <script type="text/javascript">
       
        
        jQuery(document).ready(function($){

          //you can now use $ as your jQuery object.
            var body = $( 'body' );
            $(".categories-itens").click(function(){
                var idcategory = $(this).attr('data-id');
                var descategory = $(this).children('span').html();
                var idorder = $(getidorder).attr('data-idorder');    
                $.ajax({
                    url:"../../searchprodstock.php",
                    method:"POST",
                    data:{
                        idcategory:idcategory,
                        idorder:idorder,
                        descategory:descategory
                    },
                    success:function(data){
                        $("#ul-list").html(data);    
                    }    

                });
            });
             $('.value-mask').mask("#.##0,00", {reverse: true});
             $('.rg-mask').mask('00.000.000-00');
             $('.cpf-mask').mask('000.000.000-00');
             $('.date-mask').mask('AA/AA/AA');
             $('.phone-mask').mask('0000-0000');
             $('.cel-mask').mask('0 0000-0000');
             $('.cep-mask').mask('00000-000');
             $('.desstate-mask').mask('AA');
             $('.desyear-mask').mask('0000-0000');
             $('.desboard-mask').mask('AAA-0000');

             $('.deskm-mask').mask('000.000.000');
            
                // Adicionar campos pg new order  
             $('.btnshowfields').click(function(){
                var showfields = $(this).attr('data-toggle');//div

                $('#indesaddress').attr('checked',true);//input
                $('#dateclientaddress').css('display','block'); //div

                $(this).css('display','none');                  
            }); 
              
            $('#btnzipcode').click(function(){
                getzipcode();
            }); 
            function getzipcode(){
                        //var carrega_url = 'searchzipcode.php' ;
                            var zipcode = $('#deszipcode').val();
                            $.ajax({
                                method: "POST" ,
                                url: '../../../searchzipcode.php',
                                data: {"zipcode":zipcode},
                                success: function(data){    
                                    var objData = JSON.parse(data);
                                    if (objData.msgErro){
                                        $( '#inputzipcode'  ).notify( objData.msgErro,
                                            {
                                                position :"top center"
                                            });
                                        return false;                       
                            
                                    }else{
                                         
                                        $( '#inputzipcode' ).notify( 'CEP localizado (:',
                                                {
                                                    position:"top center",
                                                    className:"success"
                                                }); 
                                        if(objData.complemento == ''){
                                            objData.complemento = 'sem complemento';
                                        }
                                        $('#descomplement').val(objData.complemento);
                                        $('#desaddress').val(objData.logradouro);       
                                        $('#descity').val(objData.localidade);
                                        $('#desdistrict').val(objData.bairro);
                                        $('#desstate').val(objData.uf);
                                    }
                                },
                                beforeSend: function(){
                                    $('#img-load').css('display:block;');
                                },
                                complete:function(data){
                                    
                                },
                                error:function(){
                                }
                            
                            });
            }

        });
    </script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
   <script src="../../res/assets/js/plugins.js"></script>
    <script src="../../res/assets/js/main.js"></script>
     <script src="../../res/assets/js/lib/chart-js/Chart.bundle.js"></script> 
   <!--  <script src="../../res/assets/js/dashboard.js"></script>
      <script src="../../res/assets/js/widgets.js"></script>
       <script src="../../res/assets/js/lib/vector-map/jquery.vmap.js"></script>    
       <script src="../../res/assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="../../res/assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="../../res/assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";
    
            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>
    
    
    -->
</body>
</html>