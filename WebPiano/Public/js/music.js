/**
 * 音乐上传功能
 */
$(function() {
    $('#music_upload').uploadify({
        'swf'      : SCOPE.ajax_upload_swf,
        'uploader' : SCOPE.ajax_upload_image_url,
        'buttonText': '上传音乐',
        'fileTypeDesc': 'All Files',
        'fileObjName' : 'file',
        'fileSizeLimit' : '20MB',
        //允许上传的文件后缀
        'fileTypeExts': '*.mp3; *.mp4',
        'onUploadSuccess' : function(file,data,response) {
            // response true ,false
            if(response) {
                var obj = JSON.parse(data); //由JSON字符串转换为JSON对象
                $('#' + file.id).find('.data').html(' 上传完毕');

                $("#upload_org_code_img").attr("src",obj.data);
                $("#file_upload_image").attr('value',obj.data);
                $("#upload_org_code_img").show();
            }else{
                alert('上传失败');
            }
        },
    });
});





