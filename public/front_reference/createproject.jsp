<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@taglib prefix="s" uri="/struts-tags"%>
<%@taglib uri="/struts-dojo-tags" prefix="sx"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>register</title>
<sx:head parseContent="true" />
</head>
<body>
<s:form action="createProject">
	<s:textfield name="name" label="项目名字" />
	<s:textfield name="type" label="项目类型"/>
	<s:textarea name="description" label="项目简介" cols="50" rows="4"/>
	<sx:datetimepicker name="startDate" label="创建日期"
		displayFormat="yyyy-MM-dd" value="today" />
	<sx:datetimepicker name="endDate" label="结束日期"
		displayFormat="yyyy-MM-dd" value="today" />
	<s:select name="level" label="项目状态"
		list="{'1','2','3','4','5','6'}" />
	<s:submit value="创建" />
</s:form>
</body>
</html>
