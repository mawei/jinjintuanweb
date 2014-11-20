var SAMPLE_ADVANCED_POST = 'http://api.map.baidu.com/geocoder/v2/?ak=您的密钥&callback=renderOption&output=json';

var advancedOptions = '';
var address
function showOptionsURL(type) {
    advancedOptions = SAMPLE_ADVANCED_POST;   
	address = document.getElementById('partner-create-address').value; 
	advancedOptions+="&address="+address;
};

function renderOption(response) {
    var html = '';
		if (response.status ) {
			var text = "无正确的返回结果:\n";
			return;
		}
		var location = response.result.location;
		$("#inputlonglat").attr("value",location.lat+","+location.lng);
		//var uri = 'http://api.map.baidu.com/marker?location='+ location.lat+','+location.lng +'&title='+response.result.level+'&content='+address+'&output=html';
//		var staticimageUrl = "http://api.map.baidu.com/staticimage?center=" + location.lng+','+location.lat + "&markers=" + location.lng+','+location.lat;
//		html = '<p>坐标：纬度: ' + location.lat + "  经度: " + location.lng+'<br/>';
//		html += '精度: '+response.result.precise+'<br/>' ;
//		html += '可信度: '+response.result.confidence +'<br/>';
//		html += '地址类型: '+response.result.level+'</p>' ;
//		html += '<p><img src="' + staticimageUrl + '"/></p>' ;
//		html += '<p>分享该点: <a href="' + uri + '" target="_blank">' + uri + '</a></p>'; //将该链接设置成可单击
//		document.getElementById('optionsNarrative').innerHTML = html;
		return;
}

function doOptions() {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    showOptionsURL('buttonClick');
    var newURL = advancedOptions.replace('您的密钥','U39NVZxVmipzsl02FgCzZdnB');
    script.src = newURL;
    document.body.appendChild(script);
};

var wait=60;  
function time(o) { 

        if (wait == 0) {  
            o.removeAttribute("disabled");            
            o.value="获取验证码";  
            wait = 60;  
        } else {  
            o.setAttribute("disabled", true);
            o.value = "重新发送(" + wait + ")";  
            wait--;  
            setTimeout(function() {  
                time(o)  
            },  
            1000)  
        }  
    }  

function getcode(o)
{
	time(o);
	htmlobj=$.ajax({url:"signup.php?mobile="+$("#signup-mobile").val(),async:false});
}

//<script type="text/javascript">
//$("#login-submit").click(function()
//	{
//		var username=$("#login-email-address").val();
//		var password = $("#login-password").val();
//		var url = "http://ttt27272.herobo.com/?username="+username+"&password="+password+"&jsonpCallback=?";
//		alert(url);
//		$.getJSON(url,
//				function(data){
//			
//		});
//	});
//</script>

//<script type="text/javascript">
//$("#login-submit").click(function()
//	{
//	$.getJSON("http://app.example.com/base/json.do?sid=1494&busiId=101&jsonpCallback=?",  
//            function(data){  
//    });  	});
//</script>
//<script type="text/javascript">
//$(document).ready(function(){
//	$("#login-user-form").submit(function()
//	{
//		var username=$("#login-email-address").val();
//		var password = $("#login-password").val();
//		var url = "http://ttt27272.herobo.com/?username="+username+"&password="+password+"&jsonpCallback=?";
//				$.getJSON(url,
//				function(data){	
//					return true;
//		});		
//	});
//});
//</script>

//<script type="text/javascript">  $(document).ready(function(){ 	$("#login-submit").click(function() 	{ 		var username=$("#login-email-address").val(); 		var password = $("#login-password").val(); 		var url = "http://ttt27272.herobo.com/?username="+username+"&password="+password+"&jsonpCallback=?"; 		$.getJSON(url, 				function(data){			 		}); 	}); }); </script>
