// ÿ�������ı�ʶ
var x =0;
 
var idzt = new Array();
 
var Window = function(config){
  
 //ID���ظ�
 idzt[x] = "zhuti"+x; //����ID
  
 //��ʼ�������ղ���
 this.config = {
  width : config.width || 300, //���
  height : config.height || 200, //�߶�
  buttons : config.buttons || '', //Ĭ���ް�ť
  title : config.title || '����', //����
  content : config.content || '����', //����
  isMask : config.isMask == false?false:config.isMask || true, //�Ƿ�����
  isDrag : config.isDrag == false?false:config.isDrag || true, //�Ƿ��ƶ�
  };
  
 //���ص�������
 var w = ($(window).width()-this.config.width)/2;
 var h = ($(window).height()-this.config.height)/2;
  
 var nr = "<div class='zhuti' id='"+idzt[x]+"' bs='"+x+"' style='width:"+this.config.width+"px; height:"+this.config.height+"px; background-color:white; left:"+w+"px; top:"+h+"px;'></div>";
 $("body").append(nr);
  
 //���ص�������
 var content ="<div id='title"+x+"' class='title' bs='"+x+"'>"+this.config.title+"<div id='close"+x+"' class='close' bs='"+x+"'>��</div></div>";
 //���ص�������
 var nrh = this.config.height - 75;
 content = content+"<div id='content"+x+"' bs='"+x+"' class='content' style='width:100%; height:"+nrh+"px;'>"+this.config.content+"</div>";
 //���ذ�ť
 content = content+"<div id='btnx"+x+"' bs='"+x+"' class='btnx'>"+this.config.buttons+"</div>";
  
 //�����⡢���ݼ���ť��ӽ�����
 $('#'+idzt[x]).html(content);
  
  
 //�������ֲ�
 if(this.config.isMask)
 {
  var zz = "<div id='zz'></div>";
  $("body").append(zz);
  $("#zz").css('display','block');
 }
  
 //�����С���ƣ������ƶ���ҳ����
 var maxX = $(window).width()-this.config.width;
 var maxY = $(window).height()-this.config.height;
 var minX = 0,
  minY = 0;
  
 //�����ƶ�
 if(this.config.isDrag)
 {
  //����ƶ�������
  $(".title").bind("mousedown",function(e){
     
    var n = $(this).attr("bs"); //ȡ��ʶ
     
    //ʹѡ�еĵ����ϲ�
    $(".zhuti").css("z-index",3);
    $('#'+idzt[n]).css("z-index",4);
     
    //ȡ��ʼ����
    var endX = 0, //�ƶ���X����
     endY = 0, //�ƶ���Y����
     startX = parseInt($('#'+idzt[n]).css("left")), //������ĳ�ʼX����
     startY = parseInt($('#'+idzt[n]).css("top")), //������ĳ�ʼY����
     downX = e.clientX, //��갴��ʱ������X����
     downY = e.clientY; //��갴��ʱ������Y����
      
    //������ƶ��¼�
    $("body").bind("mousemove",function(es){
      
     endX = es.clientX - downX + startX; //X�����ƶ�
     endY = es.clientY - downY + startY; //Y�����ƶ�
      
     //�����С����
     if(endX > maxX)
     {
      endX = maxX;
     } else if(endX < 0)
     {
      endX = 0;
     }
     if(endY > maxY)
     {
      endY = maxY;
     } else if(endY < 0)
     {
      endY = 0;
     }
      
     $('#'+idzt[n]).css("top",endY+"px");
     $('#'+idzt[n]).css("left",endX+"px");
      
     window.getSelection ? window.getSelection().removeAllRanges():document.selection.empty(); //ȡ��ѡ���ı�
      
     });
   });
  //��갴��̧���ͷ��ƶ��¼�
  $("body").bind("mouseup",function(){
    
    $("body").unbind("mousemove");
    
   });
 }
  
 //�رմ���
 $(".close").click(function(){
   
   var m = this.getAttribute("bs"); //�ұ�ʶ
   $('#'+idzt[m]).remove(); //�Ƴ�����
   $('#zz').remove(); //�Ƴ����� 
   
  })
   
  x++; //��ʶ����
   
}
// JavaScript Document