<?php 
spl_autoload_register(
  callback: function ($pClassName): void {
    spl_autoload(class: strtolower(string: str_replace(search: "\\", replace: "/", subject: $pClassName)));
  }
);
    // Enregistre la fonction chargeClass pour qu'elle soit appelée automatiquement pour charger les classes
?>

