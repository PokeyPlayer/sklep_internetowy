<?php
require_once 'init.php';

getRouter()->setDefaultRoute('productsList');
getRouter()->setLoginRoute('login');

getRouter()->addRoute('productsList', 'ProductsListCtrl');
getRouter()->addRoute('productsListPart', 'ProductsListCtrl');
getRouter()->addRoute('productView', 'ProductViewCtrl');
getRouter()->addRoute('commentDelete', 'ProductViewCtrl');
getRouter()->addRoute('loginShow', 'LoginCtrl');
getRouter()->addRoute('login', 'LoginCtrl');
getRouter()->addRoute('logout', 'LoginCtrl');
getRouter()->addRoute('registrationShow', 'RegistrationCtrl');
getRouter()->addRoute('registration', 'RegistrationCtrl');
getRouter()->addRoute('verification', 'VerificationCtrl');
getRouter()->addRoute('addComment', 'AddCommentCtrl', ['user','admin']);
getRouter()->addRoute('saveComment', 'AddCommentCtrl', ['user','admin']);
getRouter()->addRoute('userProfileEdit', 'UserEditCtrl', ['user','admin']);
getRouter()->addRoute('userProfileSave', 'UserEditCtrl', ['user','admin']);
getRouter()->addRoute('cartProducts', 'CartCtrl', ['user','admin']);
getRouter()->addRoute('addToCart', 'CartCtrl', ['user','admin']);
getRouter()->addRoute('quantityChange', 'CartCtrl', ['user','admin']);
getRouter()->addRoute('deleteFromCart', 'CartCtrl', ['user','admin']);
getRouter()->addRoute('addAddressShow', 'AddAddressCtrl', ['user','admin']);
getRouter()->addRoute('addAddress', 'AddAddressCtrl', ['user','admin']);
getRouter()->addRoute('editAddress', 'EditAddressCtrl', ['user','admin']);
getRouter()->addRoute('editAddressSave', 'EditAddressCtrl', ['user','admin']);
getRouter()->addRoute('deleteAddress', 'EditAddressCtrl', ['user','admin']);
getRouter()->addRoute('order', 'OrderCtrl', ['user','admin']);
getRouter()->addRoute('walletView', 'WalletCtrl', ['user','admin']);
getRouter()->addRoute('topUpWallet', 'WalletCtrl', ['user','admin']);
getRouter()->addRoute('purchasedProductsView', 'PurchasedProductsCtrl', ['user','admin']);
getRouter()->addRoute('purchasedProductsViewPart', 'PurchasedProductsCtrl', ['user','admin']);
getRouter()->addRoute('adminView', 'AdminCtrl', ['admin']);
getRouter()->addRoute('adminViewPart', 'AdminCtrl', ['admin']);
getRouter()->addRoute('adminViewPart2', 'AdminCtrl', ['admin']);
getRouter()->addRoute('userDelete', 'AdminCtrl', ['admin']);
getRouter()->addRoute('userBlock', 'AdminCtrl', ['admin']);
getRouter()->addRoute('userUnlock', 'AdminCtrl', ['admin']);
getRouter()->addRoute('addProduct', 'AdminCtrl', ['admin']);
getRouter()->addRoute('userEditAdmin', 'AdminUserEditCtrl', ['admin']);
getRouter()->addRoute('userSaveAdmin', 'AdminUserEditCtrl', ['admin']);
getRouter()->addRoute('productDelete', 'AdminCtrl', ['admin']);
getRouter()->addRoute('productEdit', 'ProductEditCtrl', ['admin']);
getRouter()->addRoute('productEditSave', 'ProductEditCtrl', ['admin']);
getRouter()->addRoute('resetPasswordShow', 'ResetPasswordCtrl');
getRouter()->addRoute('resetPassword', 'ResetPasswordCtrl');

getRouter()->go();