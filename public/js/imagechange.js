
function getNames(obj,name,tag)
{
	var getlist = getid(obj).getElementsByTagName(tag);	//��ȡobj����ı�ǩ������div
	var retlist = new Array();
	for(i=0;i<getlist.length;++i){
		if(getlist[i].getAttribute("name") == name){		//����name����ƥ��˴�����ֵ�ı�ǩ�����½�����retlist������
			retlist[retlist.length] = getlist[i];
		}
	}
	return retlist;
}

function dismode(obj,num,tag,name,class1,class2)			//ת����ʾģʽ��ͨ�����������ĸı���css��ʵ��ͼƬ�����ֵ��л�
{
	var dislist = getNames(obj,name,tag);
	for(i = 0;i<dislist.length;++i){
		if(i == num){
			dislist[i].className = class1;					//ע��className��д������Сд������ȷ
		}
		else{
			dislist[i].className = class2;
		}
	}
}

function play(num)
{
	var f = getid('focus');
	var c = getid('caption');
	var i = getid('focimg');								
	try{												//try��catch�������������firefox����ʶ��filters�˾����ʶ���catch�����⴦��
		with(i)
		{
			filters[0].Apply();							//Apply����һ�������滻��ǰ����
			dismode(i,num,"div","f","dis","undis");		//����dismode������div���cssʵ��ת��Ч��
			dismode(f,num,"div","f","","f1");
			dismode(c,num,"div","f","dis","undis");
			filters[0].play();							//�����˾�
		}
	}
	catch(e){
		dismode(i,num,"div","f","dis","undis");			//��������ʱת���ﴦ����û���˾�Ч����ֱ���л�
		dismode(f,num,"div","f","","f1");
		dismode(c,num,"div","f","dis","undis");
	}
}

var autoStart = 0;
var n = 0;	
function clearAuto() {clearInterval(autoStart);};
function setAuto(){autoStart=setInterval("auto(n)", 3000)}
function auto()	{
	n++  ;
	if(n>4){
		n = 0;
		clearAuto();
		setAuto();
	 }
	play(n);
}

setAuto();
