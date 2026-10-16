<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Order extends Model {
 protected $fillable=['public_token','customer_name','customer_phone','customer_email','order_type','notes','status','payment_status','payment_method','subtotal','discount_total','tax_total','total'];
 protected function casts(): array { return ['subtotal'=>'decimal:2','discount_total'=>'decimal:2','tax_total'=>'decimal:2','total'=>'decimal:2']; }
 public function items(){ return $this->hasMany(OrderItem::class); }
}
