	var iminitright = "tuangou,"+opt.cityenname;
	jQuery.get("/"+opt.cityenname+"/showuseridandsitekey"+"?"+Math.random(),function(data){
		var ret = eval("(" + data + ")");
		var iminitleft = ret.iminitleft;
		IM_Init(iminitleft,iminitright);
	});
	// showbangbang();

	function sendMessage(uid){
		var gbtitle=$("#gbtitle").html();
		IM_SendMessage(uid,
				{id:opt.gbid,title:gbtitle,url:'http://t.58.com/'+opt.cityenname+'/p_wlgw/'+opt.gbid,
				pubTime:opt.gbstarttime,contector:''});
	}
	Array.prototype.indexOf = function(val) {
		for (var i = 0; i < this.length; i++) {if (this[i] == val) return i; }   
		return -1;
	};   
	Array.prototype.remove = function(val) { 
		var index = this.indexOf(val);
		if (index > -1) {this.splice(index, 1);}
	};
	 
	var useridnew = opt.uids; 
	for(var j = 0; j < useridnew.length; j++){
		if(useridnew[j] == 0){
			useridnew.remove(0);
		}
	}
	var uidlist = opt.uids;
	function showbangbang(){
		if(opt.ennameType && opt.ennameType == 'wlgw' && useridnew.length > 0){
			IM_QueryUserState(useridnew, function(json){
				for(var i = 0; i < uidlist.length; i++){
					if(uidlist[i] != 0){
						if(json[i].status==0){
							$("#bangbangchat_"+(i+2)).html("<a href='javascript:void(0)' onclick='sendMessage("+uidlist[i]+
									");'><img src=\"http://pic2.58.com/bangbang/res/images/online.gif\" alt=\"58帮帮\"/></a>");
						}
					}
				}
			});
		}
	}

	function share(name){
		if(product!=undefined && !jQuery.isEmptyObject(product) ){
			var productUrl = product.url;
			var productUrlShare = product.urlShare;
			if(name =="kaixin"){
				
				var url = 'http://www.kaixin001.com/repaste/share.php?rurl='+productUrl+'&rcontent='+encodeURIComponent("【58团购】"+product.name + productUrl) + '&rtitle='+encodeURIComponent(product.shortname);
				window.open(url); 
				return false;
			}
			else if(name =="renren"){
				var url = 'http://share.renren.com/share/buttonshare.do?link='+productUrl+'&title='+encodeURIComponent("【58团购】"+product.name);
				window.open(url);
				return false;
			}
			else if(name == "douban"){
				var url = 'http://www.douban.com/recommend/?url='+productUrl+'&title=' + encodeURIComponent("【58团购】"+product.name);
				window.open(url);
				return false;
			}
			else if(name =="sina"){
				var productname = product.name;
				if(productname.length > 120){
					productname = productname.substr(0,120);
				}
				var url = 'http://v.t.sina.com.cn/share/share.php?appkey=3479120830&ralateUid=1749295035&url='+productUrlShare+'?utm_source=fenxiang_haoyou1&title=' + encodeURIComponent("【"+product.address+"】 "+product.name+">>") + '&pic=' + encodeURIComponent(product.image);
				window.open(url);
				return false;
			}
			else if(name =="n163"){
				var url = 'link=http://t.58.com/&source='+ encodeURIComponent('58团购')+ '&info='+ encodeURIComponent("【@58团购】#"+product.address+"#"+product.name) + ' ' + encodeURIComponent(productUrl);
				window.open('http://t.163.com/article/user/checkLogin.do?'+url+'&'+new Date().getTime(),'newwindow','height=330,width=550,top='+(screen.height-280)/2+',left='+(screen.width-550)/2+', toolbar=no, menubar=no, scrollbars=no,resizable=yes,location=no, status=no');
				return false;
			}
			
			else if(name == "qq"){
				var productname = product.name;
				if(productname.length > 120){
					productname = productname.substr(0,120);
				}
				var url = 'http://v.t.qq.com/share/share.php?title='+encodeURIComponent("【"+product.address+"】"+productname+">>")+'&url='+productUrlShare+'?utm_source=fenxiang_haoyou1&appkey='+encodeURI("")+'&site='+productUrl+'&pic='+product.image; 
				window.open( url,'转播到腾讯微博', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' ); 
				return false;
			}
			else if(name =="sinasay"){
				var productname = jQuery.trim($("#syscomment").text());
				var productImage = $("#syscomment").find("img").attr("src");
				if($("#syscomment").find("img").length<=0){
					productImage = product.image;
				}
				if(productname.length > 130){
					productname = productname.substr(0,130);
				}
				var url = 'http://v.t.sina.com.cn/share/share.php?appkey=3479120830&url='+productUrlShare+'?utm_source=fenxiang_shuo&title=' + encodeURIComponent(productname+" @58团购  ") + '&pic='+productImage;
				window.open(url);
				return false;
			}
			else if(name == "qqsay"){
				var productname = jQuery.trim($("#syscomment").text());
				var productImage = $("#syscomment").find("img").attr("src");
				if(productname.length > 130){
					productname = productname.substr(0,130);
				}
				if($("#syscomment").find("img").length<=0){
					productImage = product.image;
				}
				var url = 'http://v.t.qq.com/share/share.php?title='+encodeURIComponent(productname+" @tuan58 ")+'&url='+productUrlShare+'?utm_source=fenxiang_shuo&appkey='+encodeURI("")+'&site='+productUrl+'&pic='+productImage; 
				window.open( url,'转播到腾讯微博', 'width=700, height=680, top=0, left=0, toolbar=no, menubar=no, scrollbars=no, location=yes, resizable=no, status=no' ); 
				return false;
			}
			
			
			
		}
	}
 
	
 		// 想团什么模块
		$("#wantbuycontext").keyup(function(){
			var content = $(this).val();
			var l = content.length;
			if(l>200) {
				content = content.substr(0,200);
				l=200;
				$(this).val(content);
				$(this)[0].scrollTop=$(this)[0].scrollHeight
			};							
			$("#curNum").html(l);
		}).click(function(){
			if($(this).val()=="请输入您想团购的物品名称"){
				$(this).css({"color":"#000"});
				$(this).val("");
			}
		}).blur(function(){
			if($(this).val()==""){
				$(this).val("请输入您想团购的物品名称");
				$(this).css({"color":"#666"});
			}
		});
		$("#wantbuybtn").click(function(){
		
			var context = $("#wantbuycontext").val();
			if(context!=""&&context!="请输入您想团购的物品名称"){
			
				jQuery.post("/wantbuy/"+opt.cityenname,{context:context},function(data){
					if(data=="true"){
						$("#wantproduct").html("谢谢参与，提交成功!");
					};
				});
			}
		});
		// 想团什么模块结束
		
		//图片轮转
		var oDiv=document.getElementById('order_pic');
		try
		{
			document.getElementById('siliderbtn').getElementsByTagName('li');
			var aBtn=document.getElementById('siliderbtn').getElementsByTagName('li');
			var oUl=document.getElementById('bigimg');
			var aLi=oUl.getElementsByTagName('li');
			var prev=document.getElementById('slidprev');
			var next=document.getElementById('slidnext');
			var imgtimer=null;
			var iNow=0;
			var i=0;
			oUl.style.width=aLi[0].offsetWidth*aLi.length+'px';
			oDiv.onmouseover=function()
			{
				clearInterval(imgtimer);	
			}
			oDiv.onmouseout=function()
			{
				imgtimer=setInterval(function()
				{
					iNow++;
					if(iNow==aBtn.length)
					{
						iNow=0;
					};
					tab();	
				},4000);
			};
			for(i=0;i<aBtn.length;i++)
			{
				aBtn[i].index=i;
				aBtn[i].onclick=function()
				{
					iNow=this.index
					tab();
				}
			};
			function tab()
			{
				for(i=0;i<aBtn.length;i++)
				{
					aBtn[i].className='';	
				};
				aBtn[iNow].className='active';
				//oUl.style.left=-aLi[0].offsetWidth*iNow+'px';
				startMove(oUl,{left: -aLi[0].offsetWidth*iNow});
			};
			prev.onclick=function()
			{
				iNow--;
				if(iNow==-1)
				{
					iNow=aBtn.length-1;
				};	
				tab();
			};
			next.onclick=function()
			{
				iNow++;
				if(iNow==aBtn.length)
				{
					iNow=0;
				};
				tab();
			};
			clearInterval(imgtimer);
			imgtimer=setInterval(function()
			{
				iNow++;
				if(iNow==aBtn.length)
				{
					iNow=0;
				};
				tab();	
			},4000);
		}catch(err){}

		function startMove(obj, json, fn)
		{
			clearInterval(obj.imgtimer);
			obj.imgtimer=setInterval(function (){
			doMove(obj, json, fn);
			}, 30);
		}

		function getStyle(obj, attr)
		{
			if(obj.currentStyle)
			{
				return obj.currentStyle[attr];
			}
			else
			{
				return getComputedStyle(obj, false)[attr];
			}
		}

		function doMove(obj, json, fn)
		{
			var attr='';
			var hasrecheaed=true;
			
			for(attr in json)
			{
				var iCur=0;
				
				if(attr=='opacity')
				{
					iCur=parseInt(parseFloat(getStyle(obj, 'opacity'))*100);
				}
				else
				{
					iCur=parseInt(getStyle(obj, attr));
				}
				
				if(iCur!=json[attr])	// 发现了一个值，还没到
				{
					hasrecheaed=false;
				}
				
				var iSpeed=(json[attr]-iCur)/8;
				iSpeed=iSpeed>0?Math.ceil(iSpeed):Math.floor(iSpeed);
				
				if(attr=='opacity')
				{
					obj.style.filter="alpha(opacity:"+(iCur+iSpeed)+")";
					obj.style.opacity=(iCur+iSpeed)/100;
				}
				else
				{
					obj.style[attr]=iCur+iSpeed+'px';
				}
			}
			
			if(hasrecheaed)
			{
				clearInterval(obj.imgtimer);
				if(fn)
				{
					fn();
				}
			}
		}
		
	function showmore(){
		$("#showmorediv").hide();
		$("#hidemorediv").show();
		$("dl[name=partnerinfo]").each(function(){
			$(this).show();
		});
		$("img[name=moreimg]").each(function(){
			if($(this).attr("src") == "" ){
				var thesrc = $(this).attr("tempinfo");
				$(this).attr({src:thesrc});
			}
		});
	}

	function hidemore(){
		$("#showmorediv").show();
		$("#hidemorediv").hide();
		$("dl[name=partnerinfo]").each(function(){
			$(this).hide();
		});
	}

	 


	// 验证用户邮箱
	function verifyEmail(){
		var retUrl = window.location.href;
		window.location.href = "http://my.58.com/authmail?backpath="+retUrl;
	}

	
	
	
// /////////////////////
/**
 * 切换详情\成交记录\评论\更多秒杀
 */
	$(".dtabs1>ul>li").live('click',function(){
		$(".dtabs1>ul>li").removeClass("dt_last");
		$(".dtabs1>ul>li>i").remove();
		$(this).addClass("dt_last");
		$(this).append("<i class='dt_icon'></i>"); 
		var hobj = $('.' + $(this).attr('hobj')),sobj = $('#' + $(this).attr('sobj'));
		if("actMore" == $(this).attr('sobj')){
			$('#content').hide();
		}else{
			$('#content').show();
		}
		if(hobj.length>0 && sobj.length>0){
			hobj.hide();
			sobj.show();	
		}else{
			$('#content').show();
			$('.needshide').show();
			$('#actMore').hide();
		}
	});
	
	// 评论
	function page_asyn(ol,partnerid,pageNum){
	 		if( opt.commentCount == '0' ){
				 $("#comment").html("<div class='noresult' id='nocomments' style='display:none'>暂无评价记录</div>");
			     if(g>0){
	  		      $("#nocomments").css("display","");
	  	         }
				
			}else{
				$.ajax({
					  url:opt.contextPath+"/page_asynn/"+ol+"/"+partnerid+"/"+pageNum+"?t=2&cityname="+opt.cityenname,
					  data:"gbid="+opt.gbid,
				      success:function(data){
				    	  $("#comment").html(data);
				    	  $("#gotoOrder").attr("href","/usercenter/"+opt.cityenname+"/orderlist/all/1");
				    	  if(h>0){
				    		  $("#nocomments").css("display","");
				    	  }
				 	  }
				  });
				
			}	
	 		
			   // 行为事件记录 by HL
			  if(pageNum == 1 && ol > 0){
			  	if(ol == 1){
					_hl.push(['_trackEvent','index','detail','commentR']); // 好评
				}else if(ol == 2){
					_hl.push(['_trackEvent','index','detail','commentM']);// 中评
				}else if(ol == 3){
					_hl.push(['_trackEvent','index','detail','commentB']);// 差评
				}
			  }
		}
	
	//成交记录
	function page_asyn_order(pageNum){
				$.ajax({
					  url:opt.contextPath+"/ordersell_asyn/"+pageNum+"?t=1",
					  data:"gbid="+opt.gbid,
				      success:function(data){
				    	  $("#sellrecord").html(data);
				    	  if(g>0){
				    		  $("#noorder").css("display","");
				    	  }
				 	  }
				  })
		}
		
	function get_scrollTop_of_body(){ 
			var scrollTop; 
			if(typeof window.pageYOffset != 'undefined'){ 
			   scrollTop = window.pageYOffset;
			} 
			else 
				if(typeof document.compatMode != 'undefined' && 
				   document.compatMode != 'BackCompat'){ 
				   scrollTop = document.documentElement.scrollTop;
				} 
			else 
				if(typeof document.body != 'undefined'){ 
				   scrollTop = document.body.scrollTop;
				}
	        return scrollTop; 
	   }
		
	function getReqId(url){
			var str = "req_id=";
			var idx = url.indexOf(str);
			var reqid = url.slice(idx + str.length);
		    var re = /[a-zA-Z0-9]+/;
			return reqid.match(re);
		}
	function isFromRecommend(url){
			if(url.indexOf("req_id=") == -1){
				return false;
			}else{
				return true;
			}
		}
		
	var bfd_url = window.location.href;
	if(bfd_url.indexOf("req_id")>=0){
			var query = bfd_url.substring(bfd_url.indexOf("req_id"),bfd_url.length);
			var loginlink = $(".nologin>li>a").get(0);
			$(loginlink).attr("href",$(loginlink).attr("href")+"?"+query);
	}
		
	var asyncomment=0;
	var k=0;
	var h=0;
	var g=0;
	var asynmoremiao=0;
	var isSale="n";
	
 		$("a[name=displayMap]").click(function(){
			this.href="http://searchbox.mapbar.com/publish/template/template1010/index.jsp?CID=mapbar58&tid=tid1010&nid="+this.id+"&width="+$(window).width()+"&height="+$(window).height()+"&control=2&infopoi=1&infoname=0&zoom=8";
		});
		
		$("a[name=otherGbUrl]").click(function(){
			this.href+="?linkid=youce_" + this.id
		});
		var url	 = self.location.href;
		if(isFromRecommend(url)==true){
			var new_url=$("a[name='det_buy']").attr("href");
			var replace_url=new_url+"&req_id="+getReqId(url);
			$("a[name='det_buy']").attr("href",replace_url);
		}
		jQuery.get("/isnopay/"+opt.gbid+"?"+Math.random(),function(data){ 
			var msg = eval("(" + data + ")");
			if(msg != ""){
			var orderid = msg.orderid;
			var prodcount = msg.prodcount;
				if(orderid != undefined && orderid != null && orderid != ""
				&& prodcount != undefined && prodcount != null &&  prodcount != ""){
					$("#nopayDiv").show();
					var payhref = "javascript:postToURL('/order/"
					+opt.cityenname+"/"+opt.gbid+"',{orderid:'"+orderid+ "',count:"+prodcount+"})";
					$("#payurl").attr("href",payhref);
				}
			}
		});
 
		var fbartop =$("#floatbar").offset().top;
		
		$(window).scroll(function(){
			var _scrltop = get_scrollTop_of_body();
			//alert(_scrltop);
			if( _scrltop > fbartop){
				$("#floatbar").attr("style","top:"+_scrltop+"px;position: absolute;z-index:9999;");
				$("#float_dt_qg").show();
			}else{
				$("#floatbar").removeAttr("style");
				$("#float_dt_qg").hide();
			}
			
			if($("#floatbar").offset().top < get_scrollTop_of_body() + $(window).height() &&asyncomment==0  ){
				if( opt.gbissend == '0' || opt.gbissend == '1' || opt.gbissend == '2' || opt.gbissend == '6'){
					page_asyn(0,0,1);
					asyncomment++;	
				}	
				
			}
			
			if($("#floatbar").offset().top < get_scrollTop_of_body() + $(window).height() &&k==0){
			   if( opt.gbissend == '0' || opt.gbissend == '1' || opt.gbissend == '2' || opt.gbissend == '6'){
			    	page_asyn_order(1);
					k++;
			    }
			}
		});
		
		/**
		 * 用户点评
		 */
		$("#commentSpanId").click(function(){
			if(asyncomment==0){
				if( opt.gbissend == '0' || opt.gbissend == '1' || opt.gbissend == '2' || opt.gbissend == '6'){
					page_asyn(0,0,1);
				 	asyncomment++;
					h++;
				}
			}
			$("#nocomments").css("display","");
			_hl.push(['_trackEvent','index','detail','commentSpanId']);// 行为事件记录
																		// by HL
			var scrtop = get_scrollTop_of_body();
			if(scrtop >fbartop )
				window.scrollTo(0,fbartop);
		});
		/**
		 * 成交记录
		 */
	    $("#orderSpanId").click(function(){
	    	if(k==0){
			    if( opt.gbissend == '0' || opt.gbissend == '1' || opt.gbissend == '2' || opt.gbissend == '6'){
					page_asyn_order(1);
					k++;
					g++;			    	
			    }
			}
	    	$("#noorder").css("display","");

	    	_hl.push(['_trackEvent','index','detail','orderSpanId']);// 行为事件记录
																		// by HL
	    	var scrtop = get_scrollTop_of_body();
			if(scrtop >fbartop )
				window.scrollTo(0,fbartop);
		});
	    
		/**
		 * 本单详情
		 */
	    function getDetail(){
			$.ajax({			    	
				  type: "GET",
				  url: opt.contextPath+"/groupbuydetail/"+opt.gbid+"/?t="+new Date().getTime(),
				  async:true,
				  success:function(data){
					  $("#detaildes").html(data);
				  }
		    	});  	    	
	    }
	    $("#orderdetails_Id").click(function(){
	    	$("#nocomments").css("display","none");
	    	$("#noorder").css("display","none");
	    	$("#actMore").css("display","none");
	    	_hl.push(['_trackEvent','index','detail','orderdetails_Id']);// 行为事件记录
																			// by
																			// HL
	    	var scrtop = get_scrollTop_of_body();
			if(scrtop >fbartop )
				window.scrollTo(0,fbartop);
	    });
		/**
		 * 更多秒杀
		 */
        $("#actSpanId").click(function(){
        	//$("#actMore").css("display","");
        	_hl.push(['_trackEvent','index','detail','actSpanId']);
        	var scrtop = get_scrollTop_of_body();
			if(scrtop >fbartop )
				window.scrollTo(0,fbartop);
        });
        $("#moreMiaosha").click(function(){
        	if(asynmoremiao==0){
  			  $.ajax({			    	
				  type: "GET",
				  url: opt.contextPath+"/getmoremiaosha?t="+new Date().getTime(),
				  data:"gbid="+opt.gbid+"&cityid="+opt.cityid,
				  async:true,
				  success:function(data){
					  asynmoremiao++;
					  $("#mslist").html(data);
				  }
		    	});        		
        	}

		});
        
        
        
        
        //抢购按钮行为
        function buyBtnClick(){
        	_hl.push(['_trackEvent','index','detail','panicbuy_B']);
        }
        
        
        //抢购按钮部分
        function getbuyurl(){
			var buyurl="#";
			if(opt.gbissend == '3' || opt.gbissend == '4' || opt.gbissend == '5' || opt.gbissend == '7'){
				buyurl = "/lottery/buy/"+opt.cityenname+"/"+opt.gbid+"?b=y";
			}else{
				buyurl = "/order/buy/"+opt.cityenname+"/"+opt.gbid+"?b=y";
			}
			return  buyurl;
        }
        
        var  initbuybutton = true ;
        function buyButtonClass(n){
        	//已审核通过的正常团购
        	if(opt.gbState == '1' && opt.gbAudit == '1'){
        		// n 1:抢购  2：已抢完 3：立即秒杀 4：即将开始5：卖光
        		 switch(n){
        		 case '1':
        			 $("#top_qg_but_div").attr("class","buy_btn b_buy")
        			 break;
        		 case '2':
        			 $("#top_qg_but_div").attr("class","buy_btn b_end")
        			 break;
        		 case '3':
        			 $("#top_qg_but_div").attr("class","buy_btn b_miaosha")
        			 break;
        		 case '4':
        			 $("#top_qg_but_div").attr("class","buy_btn b_jstart")
        			 break;
        		 case '5':
        			 $("#top_qg_but_div").attr("class","buy_btn b_mg")
        			 break;
        		 }
        		
    			//$("#top_qg_but").attr("class","but_q"+n);
    			$("#float_qg_but").attr("class","d_qg"+n);
    			$("#bottom_qg_but").attr("class","b_qg"+n);         		
        	}
      	
        }
        function buyButtonURL(href){
        	//已审核通过的正常团购
        	if(opt.gbState == '1' && opt.gbAudit == '1'){
    			$("#top_qg_but").attr("href",href);
    			$("#float_qg_but").attr("href",href);
    			$("#bottom_qg_but").attr("href",href);         		
        	}
        }
        
        function changeBuyButton(){
        	  if(opt.salesStatus == "S_BUY"){
            		//时间前缀
              	if(opt.salesType == "T_LIMITTIME"){
              		$("#timeprefix").html("距离神奇活动结束时间还有:");
              		$(".showTime>br").remove();
              		$("#timeprefix").after("<br/>");
              	}else{
              		if(opt.activityType == '2' && opt.activityStarttime > opt.currttime ){
              			$("#titleprefix").html("[限时抢购即将开始...]");
              			$("#timeprefix").html("距离神奇活动开始时间还有:");
              			$(".showTime>br").remove();
              			$("#timeprefix").after("<br/>");
              		}else {
                         // alert($("#deal-timeleft-j").html());
              			if( "<i>剩余3天以上</i>"!=$.trim($("#deal-timeleft-j").html()) && "<I>剩余3天以上</I>"!=$.trim($("#deal-timeleft-j").html()) )
              			 $("#timeprefix").html("剩余");
                        else
                         $("#timeprefix").html("");
              			$(".showTime>br").remove();        			
              		}

              	}  
        			
        			if(!initbuybutton){
        				
        				//改变标题前缀
        				if(opt.salesType == "T_LIMITTIME")
        					$("#titleprefix").html("[限时抢购中...]");
        				else
        					$("#titleprefix").html("");
            			//按钮样式
            			buyButtonClass('1');
            			//超链接URL
            			buyButtonURL(getbuyurl());    				
        			}       	  
              	  
                }else if(opt.salesStatus == "S_SECKILL"){
              		//时间前缀
          			$("#timeprefix").html("秒杀进行中");
          			$("#deal-timeleft-j").html("");
          			
          			if(!initbuybutton){
          				//改变标题前缀
              			$("#titleprefix").html("[秒杀进行中...]");
              			//按钮样式
              			buyButtonClass('3');
              			//超链接URL
              			buyButtonURL(getbuyurl());    				
          			}
              	}else if(opt.salesStatus == "S_SELLEND" || opt.salesStatus == "S_SELLOUT"){
      	    		if(opt.salesType == "T_SECKILL"){
      		    		$("#timeprefix").html("秒杀已结束");
      		    		$("deal-timeleft-j").html("");
      	    		}else{
      	    			$("#timeprefix").html("剩余");
      		    		$("#deal-timeleft-j").html("<i>0</i>天<i>0</i>小时<i>0</i>分<i>0</i>秒");
      	    		} 
      	    		
          			if(!initbuybutton){
              			if(opt.salesStatus == "S_SELLEND"){
                  			//按钮样式
              				buyButtonClass('2');    				
              			}else{
                  			//按钮样式
              				buyButtonClass('5'); 
                  				
              			}  
              			//超链接URL
              			buyButtonURL('javascript:void(0);');  
          			}        		
              	}else if(opt.salesStatus == "S_WILLBEGIN"){
      	    		if(opt.salesType == "T_SECKILL"){
      		    		$("#timeprefix").html("距离开秒时间：");
      		    		$(".showTime>br").remove();
      		    		$("#timeprefix").after("<br/>");
      	    		}else{
      	    			$("#timeprefix").html("即将开始:");
      	    		} 
              	}//end        	  
          
        	initbuybutton = false;
        	
        }
        //抢购按钮部分结束
        
    	function changewenan(ctype){
          		//限时时间进行中,修改价格,标题,
          		if(ctype == "comm_to_limit"){
          			$("#shortname").hide();
          			$("#actshortname").show();
          			$("#productname").hide();
          			$("#actproductname").show();
          			var maxcount = "",maxcountnum="";
          			if(opt.activityMaxcount && opt.activityMaxcount >0){
          				maxcount = "限量<i>"+opt.activityMaxcount+"</i>份";
          				maxcountnum = opt.activityMaxcount;
          			}else{
          				maxcount= "限量<i>无</i>";
          				maxcountnum = "无";
          			}
          			$("#salecounttip").html(maxcount);
          			$("#pricelist0").html("<td>神奇价<br>"+ 
    						"<i>&yen;"+opt.activityPrice+"</i></td>"+
    						"<td>团购价<br>"+
    						"<i>&yen;"+opt.gbprice+"</i></td>"+
    						"<td>原价<br>"+
    						"<i>&yen;"+opt.prodprice+"</i></td>	");
          			$("#statetip").html("数量有限，赶紧下单！");	
          			//$("#sp_img").html("<img src='"+opt.activityFocusImg+"'  alt='"+opt.activityShortname+"' />");
          			$("#top_qg_price").html("<i>&yen;</i>"+opt.activityPrice);
          			$("#floatprice").html("<i>&yen;</i>"+opt.activityPrice);
          			$("#bottom_qg_price").html("<i>&yen;</i>"+opt.activityPrice);
          			$("#bottom_qg_pricelist").html("<label>神奇价<br /><b>&yen;"+opt.activityPrice+"</b> </label>"+
    						"<label>原价<br /><b>&yen;"+opt.prodprice+"</b> </label>"+
    						"<label>团购价<br /><b>&yen;"+opt.gbprice+"</b> </label>"+ 
    						"<label>限量<br /><b>"+maxcountnum+" </label>	");
          			 
          		}else if(ctype == "limit_to_comm"){

          			$("#shortname").show();
          			$("#actshortname").hide();
          			$("#productname").show();
          			$("#actproductname").hide();
          			$("#salecounttip").html("<i>"+opt.salecount+"</i>人已购买");
          			$("#pricelist0").html("<td>原价<br>"+ 
    						"<i>&yen;"+opt.prodprice+"</i></td>"+
    						"<td>节省<br>"+
    						"<i>&yen;"+(opt.prodprice-opt.gbprice)+"</i></td>"+
    						"<td>折扣<br>"+
    						"<i>"+opt.discount+"</i></td>	");
          			$("#statetip").html("数量有限，赶紧下单！");	
          			//$("#sp_img").html("<img src='"+opt.activityFocusImg+"'  alt='"+opt.activityShortname+"' />");
          			$("#top_qg_price").html("<i>&yen;</i>"+opt.gbprice);
          			$("#floatprice").html("<i>&yen;</i>"+opt.gbprice);
          			$("#bottom_qg_price").html("<i>&yen;</i>"+opt.gbprice);
          			$("#bottom_qg_pricelist").html("<label>原价<br /><b>&yen;"+opt.prodprice+"</b> </label>"+
    						"<label>节省<br /><b>&yen;"+(opt.prodprice-opt.gbprice)+"</b> </label>"+ 
    						"<label>折扣<br /><b>"+opt.discount+" </label>	");
          		} 
    	}
        
        
	    
	    
	    var interval=window.setInterval(function(){
	    	
	    	var nowDate = opt.currttime;
	    	var endDate =  nowDate;
	    	//---------------------------------- debug log
	    	//console.debug("%s: %o","倒计时salesStatus： "+opt.salesStatus,this);
	    	//----------------------------------
	    	
	    	if(opt.salesStatus =="S_BUY"){ //正在抢购 分限时、还是普通；普通的还需判断是否是限时类型的判断状态转化
	    		if(opt.salesType == "T_LIMITTIME"){ //限时进行中
	    			endDate = opt.activityEndtime
	    			if(endDate - nowDate <1000){ //限时倒计时到已结束
	    				 if(opt.gbendtime > nowDate){ //转化为普通团购。
		    					endDate = opt.gbendtime;
		 	    				opt.salesStatus = "S_BUY";
			    				opt.salesType = "T_COMMONGB";
			    				changeBuyButton();
			    				changewenan("limit_to_comm");	    					 
		    			}else{
		    				 	opt.salesType = "T_COMMONGB"
		    				 	opt.salesStatus = "S_SELLEND";	 
			    				changeBuyButton();
		    			}	    				
	    			}
	    		}else{
	    			endDate = opt.gbendtime;
	    			if(opt.activityType == '2' && opt.activityStarttime > nowDate ){ //限时未开始
	    				endDate = opt.activityStarttime;
	    				if(endDate - nowDate <1000){ //普通倒计时到限时已开始
	    					endDate = opt.activityEndtime;
	 	    				opt.salesStatus = "S_BUY";
		    				opt.salesType = "T_LIMITTIME";
		    				changeBuyButton();
		    				changewenan("comm_to_limit");
	    				}
	    				
	    			}else{
	    				if(endDate - nowDate <1000 ){//普通倒计时到已结束
		    				 opt.salesType = "T_COMMONGB"
			    			 opt.salesStatus = "S_SELLEND";	 
			    			 changeBuyButton();	    					
	    				}
	    			}
	    		}
	    		
	    	}else if (opt.salesStatus == "S_SELLEND" || opt.salesStatus == "S_SELLOUT"){ //已卖光

	    		clearInterval(interval);//终止倒计时。
	    	}else if (opt.salesStatus == "S_SECKILL"){//秒杀中
	    		 
	    		clearInterval(interval);//秒杀无结束时间，终止倒计时。
	    		
	    	}else if (opt.salesStatus == "S_WILLBEGIN"){
	    		//即将开始，分秒杀和普通（是否限时优先于普通）,判断到开始的状态转变
	    		if(opt.activityType == '1'){ //秒杀
	    			endDate = opt.activityStarttime;
	    			//判断倒计时到开始的状态转化
	    			if(endDate - nowDate <1000){
	    				//秒杀已计时到开始
	    				opt.salesStatus = "S_SECKILL";
	    				//改变抢购按钮3处。 top_qg_but float_qg_but  bottom_qg_but
	    				changeBuyButton();
	    				clearInterval(interval);//秒杀无结束时间，终止倒计时。
	    				
	    			}
	    		}else {
	    			endDate = opt.gbstarttime;
	    			//如果是限时类型，判断是否倒计时到已开始,未开始走普通团购
	    			if(opt.activityType == '2' && opt.activityStarttime - nowDate <1000  ){//
	    				endDate = opt.activityEndtime;
	    				opt.salesStatus = "S_BUY";
	    				opt.salesType = "T_LIMITTIME";
	    				changeBuyButton();
	    				changewenan("comm_to_limit");
	    			}else{//普通未开始
	    				
	    				//判断是否倒计时到普通已开始。
	    				if(endDate - nowDate <1000){
	    					endDate = opt.gbendtime;
	    					opt.salesStatus = "S_BUY";
	    					changeBuyButton();
	    				}
	    			}
	    		}
	    		
	    	} 
	    	//----------------------------------
	    	
			//----------------------------------
			var seconds = Math.floor((endDate-nowDate)/1000);
			var minutes = Math.floor(seconds/60);
			var hours = Math.floor(minutes/60);
			var days = Math.floor(hours/24);
			var CDay= days;
			var CHour= hours % 24;
			var CMinute= minutes % 60;
			var CSecond= seconds % 60;
			//----------------------------------
			//console.debug("%s: %o", "倒计时："+CDay+":"+CHour+":"+CMinute+":"+CSecond, this);
	    	if(CDay > 3 && opt.salesStatus =="S_BUY" ){
	    		$("#timeprefix").html("");
	    		$("#deal-timeleft-j").html("<i>剩余3天以上</i>");
	    		clearInterval(interval);
	    	}else if ( CDay <= 0 && CHour <= 0 && CMinute <= 0 && CSecond <= 0  ){
	    		if(opt.activityType == '1')
	    			$("#deal-timeleft-j").html("");
	    		else
	    			$("#deal-timeleft-j").html("<i>0</i>天<i>0</i>小时<i>0</i>分<i>0</i>秒");
	    		clearInterval(interval);
	    	}else{
	    		$("#deal-timeleft-j").html("<i>"+CDay+"</i>天<i>"+CHour+"</i>小时<i>"+CMinute+"</i>分<i>"+CSecond+"</i>秒");
	    	}
	    	if(initbuybutton){
	    		changeBuyButton();
	    	}
	    	
	    },1000);
	    
	    showbangbang();
	    getDetail();