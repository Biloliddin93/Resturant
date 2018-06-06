@extends("temp")


@if($type =="users")
    @include("pages/users")
@endif

@if($type =="users_edit")
    @include("pages/usersedit")
@endif


@if($type =="taom")
    @include("pages/taom")
@endif


@if($type =="taom_edit")
    @include("pages/taomedit")
@endif
@if($type =="zakaz")
    @include("pages/zakaz")
@endif
@if($type =="zakaz_one")
    @include("pages/zakaz_one")
@endif

@if($type =="povar")
    @include("pages/povar")
@endif
@if($type =="login")
    @include("pages/login")
@endif