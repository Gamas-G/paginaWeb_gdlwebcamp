//var api = "aqui va una clave de api para el maps"//puto google ahora cobra :v

(function(){
    "use strict"
    
    var regalo = document.getElementById( 'regalo' ) //Segun falla dentro de la funcion?????
    document.addEventListener( "DOMContentLoaded", function(){
        
        
        //Campos datos usuarios
        var email    = document.getElementById( 'email' )
        var nombre   = document.getElementById( 'nombre' )
        var apellido = document.getElementById( 'apellido' )

        //Campos pases
        var pase_dia      = document.getElementById( 'pase_dia' )
        var pase_dosdia   = document.getElementById( 'pase_dosdia' )
        var pase_completo = document.getElementById( 'pase_completo' )

        //Botones y divs
        var errorDiv        = document.getElementById( 'error' )
        var calcular        = document.getElementById( 'calcular' )
        var suma            = document.getElementById( 'suma-total' )
        var botonRegistro   = document.getElementById( 'btnRegistro' )
        var lista_productos = document.getElementById( 'lista_productos' )//Div vacio en el HTML, aqui insertaremos valores

        //Extras
        var etiquetas = document.getElementById( 'etiquetas' )
        var camisas   = document.getElementById( 'camisa_evento' )

        //Aqui se hace una valicacion ya que el id calcular no existe asi que el navegador no puede leer esto, se valida y si no pues no se ejecutara, cuando se salte a la pagina pues la validacion aceptara
        //De hecho todos estos id corresponden a la pagina de registro asi que el DOM del index no existe ningun id de estos. si te fijas cuando pasas a registro.html este error no aparece ya que todos los id estan en ese DOM
        if(document.getElementById('calcular')){

        //Eventos
        calcular.addEventListener( 'click', calcularMontos ) //Calcula el total de los boletos, regalos. etc

        pase_dia.addEventListener     ( 'blur', mostrarDias )
        pase_dosdia.addEventListener  ( 'blur', mostrarDias )
        pase_completo.addEventListener( 'blur', mostrarDias )

        nombre.addEventListener  ( 'blur', validarCampos )
        apellido.addEventListener( 'blur', validarCampos )
        email.addEventListener   ( 'blur', validarCampos )
        email.addEventListener   ( 'blur', validarMail )

        botonRegistro.disabled = true



        //Funciones
        function calcularMontos( event ){

            event.preventDefault();

            if(!regalo.value){
                alert( "seleccione un regalo" )
                regalo.focus()
                return
            }

            /*var hey = "hola"
            var res = parseInt("hey", 10) || 0 //si el parse no convierte la cadena enviada la condicional || retorna el valor 0
            console.log( res )*/
            
            var boletosDias     = parseInt( pase_dia.value, 10 )      || 0,
                boletos2Dias    = parseInt( pase_dosdia.value, 10 )   || 0,
                boletoCompleto  = parseInt( pase_completo.value, 10 ) || 0,
                cantCamisas     = parseInt( camisas.value, 10 )       || 0,
                cantEtiquetas   = parseInt( etiquetas.value, 10 )     || 0



            var totalPagar = (( boletosDias * 30 ) + ( boletos2Dias * 45 ) + ( boletoCompleto * 50 ) + ( cantCamisas * 9.3 ) + ( cantEtiquetas * 2 )).toFixed(2)

            var listadoProductos = []//Arreglo que nos ayudara a insertar en nuestro HTML

            if ( boletosDias >= 1 ) //Si las cantidades son mayores que 0 se agregaran a listaProductos
                listadoProductos.push( boletosDias + " pases por días" )

            if ( boletos2Dias >= 1 )
                listadoProductos.push( boletos2Dias + " pases por 2 días" )

            if ( boletoCompleto >= 1 )
                listadoProductos.push( boletoCompleto + " pases completos" )

            if ( cantCamisas >= 1 )
                listadoProductos.push( cantCamisas + " Camisas" )

            if ( cantEtiquetas >= 1 )
                listadoProductos.push( cantEtiquetas + " Etiquetas" )

            lista_productos.style.display = "block"//Viasulizamos el div, ya que lo tenemos en none
            lista_productos.innerHTML = ''//Para que cada vez que se da click se borre lo que contiene la memoria.Osea no se concatene con datos viejos

            for ( var i = 0; i < listadoProductos.length; i++ ) {
                lista_productos.innerHTML += listadoProductos[i] + '<br/>'
            }

            suma.innerHTML = "$ " + totalPagar

            botonRegistro.disabled = false

            document.getElementById('total_pedido').value = totalPagar

        }

        function mostrarDias(){
            
            var boletosDias     = parseInt( pase_dia.value, 10 )      || 0,
                boletos2Dias    = parseInt( pase_dosdia.value, 10 )   || 0,
                boletoCompleto  = parseInt( pase_completo.value, 10 ) || 0

            var diasElegidos = []

            if( boletosDias > 0 )
                diasElegidos.push( 'viernes' )

            if( boletos2Dias > 0 )
                diasElegidos.push( 'viernes', 'sabado' )
            
            if( boletoCompleto > 0 )
                diasElegidos.push( 'viernes', 'sabado', 'domingo' )

            for ( var i = 0; i < diasElegidos.length; i++ ) {
                document.getElementById(diasElegidos[i]).style.display = 'block'
            }
            
        }

        function validarCampos(){//Observacion: pide convertir a una clase debido a que utilizamos la palabra 'this' haciendo referencia a la propiedad pasada por parametro en este caso 'HTMLElement'

            if(this.value == ''){
                errorDiv.style.display = 'block'
                errorDiv.innerHTML = "Este campo es obligatorio"
                this.style.border = '1px solid red'
                errorDiv.style.border = '1px solid red'
            }else{
                errorDiv.style.display = 'none'
                this.style = "reset"//Resetea su estilo a su estado normal
            }
        }

        function validarMail(){

            if ( this.value.indexOf("@") > -1 ){
                errorDiv.style.display = 'none'
                this.style = "reset"
            }
            else{
                errorDiv.style.display = 'block'
                errorDiv.innerHTML = "Debe tener al menos un @"
                this.style.border = '1px solid red'
                errorDiv.style.border = '1px solid red'
            }
        }
    }


    })//DOM CONTENT LOADED
})()


//MI JQUERY
$(function(){

    //Animando las letras del encabezado con el plugin 'Lettering'
    $('.nombre-sitio').lettering()

    //Agregar clase a menu
    $('body.conferencia .navegacion-principal a:contains("Conferencias")').addClass('activo')
    $('body.calendario .navegacion-principal a:contains("Calendario")').addClass('activo')
    $('body.invitados .navegacion-principal a:contains("Invitados")').addClass('activo')

    //Menu Fijo(efecto de sticky pero con fixed ver ya que sticky esta soportado hoy en dia 2020)
    var windowHeight = $(window).height()
    var barraAltura = $('.barra').innerHeight()
    // console.log("la ventana mide: " + windowHeight)
    // console.log(barraAltura)

    $(window).scroll(function(){

        var scroll = $(window).scrollTop()
        if(scroll > windowHeight){
            $('.barra').addClass('fixed')
            $('body').css( {'margin-top': barraAltura+'px'} )
        }else{
            $('.barra').removeClass('fixed')
            $('body').css( {'margin-top': '0px'} )
        }
        
    })

    //Menu responsive Movil
    $('.menu-movil').on('click',function(){

            $('.navegacion-principal').slideToggle(800)//Da una animacion como el slideUp y slideDown pero en una sola funcion
    })

    //Seccion de Conferencias
    $('.programa-evento .info-cursos:first').show()//Mostrarmos el primer div
    $('.menu-programa a:first').addClass('activo')

    $('.menu-programa a').on('click', function(){
        
        $('.menu-programa a').removeClass('activo')//Removemos la clase activo en todos para dar el efecto de que se mueve el triangulo
        $(this).addClass('activo')//agregamos la clase en la etiqueta 'a' donde fue presionada
        var enlace = $(this).attr('href')//extraemos el atributo href en este caso contiene el id donde se hace referencia
        $('.ocultar').hide()//ocultamos todos los divs ya que todos tiene esta clase
        $(enlace).fadeIn(1000)//Y por ultimo mostrarmos coon un efeto de desplazamiento el div con el id que esta almacenado en la variable

        return false//esto es como el metodo .prevenDefault()

    })

    //Animaciones numeros con animateNumber desde un plugin
    //Observemos que JQuery nos otorga colocar una sintaxis de CSS3
    $('.resumen-evento li:nth-child(1) p').animateNumber( {number: 6}  , 1200 )
    $('.resumen-evento li:nth-child(2) p').animateNumber( {number: 15} , 1200 )
    $('.resumen-evento li:nth-child(3) p').animateNumber( {number: 3}  , 1500 )
    $('.resumen-evento li:nth-child(4) p').animateNumber( {number: 9}  , 1500 )

    //Animando otros numero pero con el plugin 'The Final Countdown' una cuenta regresiva
    $('.cuenta-regresiva').countdown('2020/11/1 09:00:00', function(event){
        $('#dias').html(event.strftime('%D'))
        $('#horas').html(event.strftime('%H'))
        $('#minutos').html(event.strftime('%M'))
        $('#segundos').html(event.strftime('%S'))
    })

    //Plugin ColorBox
    $('.invitado-info').colorbox({inline:true, width:"50%"})


})