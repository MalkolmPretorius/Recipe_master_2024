<?php
SESSION_START();

// 1. Charge les paramètres
require_once '../app/config/params.php';

// 2. Charge la connexion
require_once '../core/connexion.php';

// 3. Charge les Tools
require_once '../core/tools.php';

// 3. Charge du videur
require_once '../core/bouncer.php';

// 5. charge les constantes
require_once '../core/constance.php';

// 6. charge la protection
require_once '../core/protection.php';