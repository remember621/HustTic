//�ж��Ƿ�ΪIE
var isIe=(document.all)?true:false;	
//��ȡid	
function getid(obj){ 
	return (typeof obj == "object")?obj:document.getElementById(obj);
}
//��ʾ��Ӧid�Ŀ�
function show(id){
	var dis = getid(id);
	dis.style.display = "block";
}
//���ض�Ӧid�Ŀ�
function hide(id){
	var undis = getid(id);
	undis.style.display = "none";
}

