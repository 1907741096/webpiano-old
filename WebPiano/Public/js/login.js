$('.loginform .submit').click(function(){
	var username=$.trim($('input[name="username"]').val());
	var password=$.trim($('input[name="password"]').val());
	if(!username){
		dialog.error('用户名不能为空');
		return;
	}
	if(!password){
		dialog.error('密码不能为空');
		return;
	}
	var data={'username':username,'password':password};
	var url="index.php?c=login&a=checklogin";
	$.post(url,data,function(result){
		console.log(result);
		if(result.status===1){
			dialog.success(result.message,'parent');
		}else{
			dialog.error(result.message);
		}
	},"JSON");
});
$('.regform .submit').click(function(){
	var username=$.trim($('input[name="username"]').val());
	var password=$.trim($('input[name="password"]').val());
	var password2=$.trim($('input[name="password2"]').val());
	if(!username){
		dialog.error('用户名不能为空');
		return;
	}
	if(!password){
		dialog.error('密码不能为空');
		return;
	}
	if(password!=password2){
		dialog.error('两次密码不一致');
		return;
	}
	var data={'username':username,'password':password,'password2':password2};
	var url="index.php?c=login&a=checkreg";
	$.post(url,data,function(result){
		if(result.status===1){
			dialog.success(result.message,'parent');
		}else{
			dialog.error(result.message);
		}
	},"JSON");
});
$('.adminform .submit').click(function(){
	var username=$.trim($('input[name="username"]').val());
	var password=$.trim($('input[name="password"]').val());
	if(!username){
		dialog.error('用户名不能为空');
		return;
	}
	if(!password){
		dialog.error('密码不能为空');
		return;
	}
	var data={'username':username,'password':password};
	var url="admin.php?c=login&a=checklogin";
	$.post(url,data,function(result){
		if(result.status===1){
			dialog.success(result.message,'admin.php');
		}else{
			dialog.error(result.message);
		}
	},"JSON");
});
