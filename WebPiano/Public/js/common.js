$('#add').click(function(){
	var url=SCOPE.add_url;
	window.location.href=url;
});
$('.table #edit').click(function(){
    var id = $(this).attr('attr-id');
    var url = SCOPE.add_url + '&id='+id;
    window.location.href=url;
});
$('.table #delete').click(function(){
    var id=$(this).attr('attr-id');
    var url=SCOPE.delete_url;
    data = {};
    data['id'] = id;
    data['status'] = -1;

    layer.open({
        type : 0,
        title : '是否提交？',
        btn: ['yes', 'no'],
        icon : 3,
        closeBtn : 2,
        content: "是否确定删除",
        scrollbar: true,
        yes: function(){
            // 执行相关跳转
            todelete(url, data);
        },
    });
});
$('#submit').click(function(){
	var data = $("#form").serializeArray();
    postData = {};
    $(data).each(function(i){
       postData[this.name] = this.value;
    });
    //console.log(postData);
    // 将获取到的数据post给服务器
    url = SCOPE.save_url;
    jump_url = SCOPE.jump_url;
    $.post(url,postData,function(result){
        if(result.status == 1) {
            //成功
            dialog.success(result.message,jump_url);
        }else if(result.status == 0) {
            // 失败
            dialog.error(result.message);
        }
    },"JSON");
});
$(".table #status").click(function(){
    var id = $(this).attr('attr-id');
    var status = $(this).attr("attr-status");
    var url = SCOPE.status_url;

    data = {};
    data['id'] = id;
    data['status'] = status;

    layer.open({
        type : 0,
        title : '是否提交？',
        btn: ['yes', 'no'],
        icon : 3,
        closeBtn : 2,
        content: "是否确定更改状态",
        scrollbar: true,
        yes: function(){
            // 执行相关跳转
            todelete(url, data);
        },
    });
});
$(".table #stick").click(function(){
    var id = $(this).attr('attr-id');
    var stick = $(this).attr("attr-stick");
    var url = SCOPE.stick_url;

    data = {};
    data['id'] = id;
    data['stick'] = stick;

    layer.open({
        type : 0,
        title : '是否提交？',
        btn: ['yes', 'no'],
        icon : 3,
        closeBtn : 2,
        content: "是否确定更改置顶",
        scrollbar: true,
        yes: function(){
            // 执行相关跳转
            todelete(url, data);
        },
    });
});
$(".table #fine").click(function(){
    var id = $(this).attr('attr-id');
    var fine = $(this).attr("attr-fine");
    var url = SCOPE.fine_url;

    data = {};
    data['id'] = id;
    data['fine'] = fine;

    layer.open({
        type : 0,
        title : '是否提交？',
        btn: ['yes', 'no'],
        icon : 3,
        closeBtn : 2,
        content: "是否确定更改加精",
        scrollbar: true,
        yes: function(){
            // 执行相关跳转
            todelete(url, data);
        },
    });
});
$(".opern_mid #collect").click(function(){
    var id = $(this).attr('attr-id');
    var postData={};
    postData['opern_id']=id;

    url = SCOPE.collect_url;

    $.post(url,postData,function(result){
        if(result.status == 1) {
            //成功
            window.location.reload();
        }else if(result.status == 0) {
            // 失败
            dialog.error(result.message);
        }
    },"JSON");
});

$(".oleft #opern_l").click(function(){
    var thumb = $(this).attr('attr-thumb');
    var opern=document.getElementById("opern_b");
    opern.src=thumb;
});

$("#listorder").click(function(){
    var data = $('#form-listorder').serializeArray();
    postData={};
    $(data).each(function(i){
        postData[this.name]=this.value;
    });
    //console.log(postData);
    var url=SCOPE.listorder_url;
    var jump_url=SCOPE.jump_url;
    $.post(url,postData,function(result){
        if(result.status==1){
            dialog.success(result.message,result['data']['jump_url']);
        }else{
            dialog.error(result.message);
        }
    },"JSON");
});

function todelete(url, data) {
    $.post(url,data,function(s){
            if(s.status == 1) {
                dialog.success(s.message,'');
                // 跳转到相关页面
            }else {
                dialog.error(s.message);
            }
        }
    ,"JSON");
}

