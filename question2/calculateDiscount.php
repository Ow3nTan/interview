<?php
$purchaseValue = $_POST['total'];

$discount = checkDiscount($purchaseValue);
$discountedTotal = $purchaseValue - $discount;
echo "Final Amount: " . $discountedTotal;
function checkDiscount($purchaseValue)
{
    if ($purchaseValue > 500) {
        return $purchaseValue * 0.1;
    } else if ($purchaseValue < 500 && $purchaseValue >= 100) {
        return $purchaseValue * 0.05;
    } else {
        return 0;
    }
}
?>