<!doctype html>
<html>
<head>
    <script type="text/javascript" src="jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style type="text/css">
        body{
            font-family:sans-serif;
            padding:0;
            margin:0;
        }
        #header{
            
            width:100%;
            background-color:#eeeee5;
            padding:2px;
            height:50px;
        }
        #logo{
            font-family:fantasy;
            color:#ab393e;
            border:1px solid #ab2343;
            float:left;
            padding:4px 6px;
            margin:2px 3px;
            border-bottom-left-radius: 6px;
            border-top-right-radius: 6px;
        }
        #buttons{
            width:233px;
            margin:0 auto;
            padding-top:7px;
        
        }
        .togbutton{
            float:left;
            border:1px solid black;
            font-size:20px;
            border-right:none;
            padding:2px;
            
        }
        #html{
            border-bottom-left-radius: 3px;
            border-top-left-radius: 3px;
        }
        #output{
            border-right:1px solid black;
            border-top-right-radius: 3px;
            border-bottom-right-radius: 3px;
        }
        .active{
            background-color:azure;
        }
        .hilighted{
            background-color:grey;
        }
        textarea{
            resize:none;
            border-top:none;
            border-color:darkgray;
        }
        .panel{
            width:50%;
            float:left;
            border-left:none;
        }
    
        #outputpanel{
            border:none;
        }
        .hidden{
            display:none;
        }
        
      
    </style>
</head>
<body>
    <div class="container-fluid" id="player">
    <div id="header">
    <div id="logo">
    CODE PLAYER    
    </div>
    <div id="buttons">
        <div class="togbutton active" id="html">html</div>
        <div class="togbutton" id="css">css</div>
        <div class="togbutton" id="javascript">javascript</div>
        <div class="togbutton active" id="output">output</div>
    </div>
    </div>
    <div  id="bodycontainer">
    <textarea id="htmlpanel" class="panel">hello</textarea>
     <textarea id="csspanel" class="panel hidden">p{
         color:red;
         }</textarea>
     <textarea id="javascriptpanel" class="panel hidden"></textarea>
    <iframe id="outputpanel" class="panel"></iframe>
    </div>
    
    </div>








    <script>
    function updateoutput(){
        $("iframe").contents().find("html").html("<html><head><style type='text/css'>"+$("#csspanel").val()+"</style></head><body>"+$("#htmlpanel").val()+"</body></html>"); 
        document.getElementById("outputpanel").contentWindow. eval($("#javascriptpanel").val());
    }
    $(".togbutton").hover(function(){
        $(this).addClass("hilighted");
        
        
    },function(){
        $(this).removeClass("hilighted");
        
    });
    $(".togbutton").click(function(){
        $(this).toggleClass("active");
        $(this).removeClass("hilighted");
        var panelid=$(this).attr("id")+"panel";
        $("#"+panelid).toggleClass("hidden");
    
       var activeclass=4-$(".hidden").length;
       $(".panel").width(($(window).width()/activeclass)-15);      
    });
    $(".panel").height($(window).height()-$("#header").height()-15);
    $(".panel").width(($(window).width()/2)-15);
    
    
    
    updateoutput();
        $("textarea").on("change keyup paste",function(){
       updateoutput();
    });
    </script>
</body>


</html>