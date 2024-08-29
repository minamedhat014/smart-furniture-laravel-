<?php

namespace App\serviceContract;



interface productDetailsServiceContract{

public function store($product_id,$validatedData);
public function update($item_id,$validatedData);
public function delete(int $id);
public function removeSet(int $id);
public function AddToSet(int $id);
}


?>