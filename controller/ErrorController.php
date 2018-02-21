<?php

function index()
{
	render("error/login_error");
}

function createError()
{
	echo "<script type='text/javascript'>alert('Alle velden moeten ingevuld zijn.');</script>";
	header("location:". URL . "todo/creatOrEdit");
}
