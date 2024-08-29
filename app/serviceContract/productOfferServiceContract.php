<?php

namespace App\serviceContract;



interface productOfferServiceContract{

public function store($validatedData);
public function update($validatedData ,$edit_id);
public function delete(int $id);
public function cancel(int $id);
public function launch(int $id);
public function index($sourceFilter ,$statusFilter,$search,$sortfilter,$perpage);



}


?>