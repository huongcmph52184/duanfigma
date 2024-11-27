<?php
    // require_once toàn bộ file commons
    require_once "../commons/env.php";
    require_once "../commons/function.php";
    // require_once toàn bộ controllers
    require_once "./Controllers/DanhmucController.php";
    require_once "./Controllers/DanhmucconController.php";
    require_once "./Controllers/SanphamController.php";
    require_once "./Controllers/HomeController.php";
    require_once "./Controllers/MausacController.php";
    require_once "./Controllers/DungluongController.php";
    require_once "./Controllers/PriceController.php";
    require_once "./Controllers/SanphamDeltailController.php";
    require_once "./Controllers/ClientController.php";
    require_once "./Controllers/TaikhoanController.php";
    // require_once toàn bộ file model
    require_once "./Model/danhmuc.php";
    require_once "./Model/sanpham.php";
    require_once "./Model/danhmuccon.php";
    require_once "./Model/mausac.php";
    require_once "./Model/dungluong.php";
    require_once "./Model/price.php";
    require_once "./Model/SanphamDetail.php";
    require_once "./Model/taikhoan.php";
    // Rote
    $act = $_GET['act'] ?? '/';
    $page = (int)($_GET['page'] ?? 1); // Lấy số trang từ URL hoặc mặc định là 1
    match($act){
        //Client
        '/' => (new ClientController())->homeClient(),
        // Trang chủ Admin
        'homeAdmin' => (new HomeControllers())->homeAdmin(),
        // Dannhmuc
        'listDanhmuc' => (new DanhmucConstrollers())->listDanhmuc(),
        'deleteDanhmuc' => (new DanhmucConstrollers())->deleteDanhmuc(),
        'createDanhmuc' => (new DanhmucConstrollers())->createDanhmuc(),
        'postcreateDanhmuc' => (new DanhmucConstrollers())->postcreateDanhmuc(),
        'updateDanhmuc' => (new DanhmucConstrollers())->updateDanhmuc(),
        'postupdateDanhmuc' => (new DanhmucConstrollers())->postupdateDanhmuc(),
        'headerDanhmuc' => (new DanhmucConstrollers())->postupdateDanhmuc(),
        // Sản Phẩm
        'listSanpham' => (new SanphamControllers())->listSanPham(),
        'listSanpham' => (new SanphamControllers())->list(),
        'deleteSanpham' => (new SanphamControllers())->deleteSanPham(),
        'createSanpham' => (new SanphamControllers())->createSanPham(),
        'postCreateSanPham' => (new SanphamControllers())->postcreateSanpham(),
        'updateSanpham' => (new SanphamControllers())->updateSanpham(),
        'postupdateSanpham' => (new SanphamControllers())->postupdateSanpham(),
        'eyeSanpham' => (new SanphamControllers())->eyeSanpham(),
        // Danhmuc con
        'listDanhmuccon' => (new DanhmucconConstrollers())->listDanhmucCon($page),
        'deleteDanhmuccon' => (new DanhmucconConstrollers())->deleteDanhmucCon(),
        'createDanhmuccon' => (new DanhmucconConstrollers())->createDanhmucCon(),
        'postcreateDanhmuccon' => (new DanhmucconConstrollers())-> postcreateDanhmucCon(),
        'updateDanhmuccon' => (new DanhmucconConstrollers()) -> updateDanhmucCon(),
        'postupdateDanhmuccon' => (new DanhmucconConstrollers()) -> postupdateDanhmuccon(),
        // mausac
        'listmausac' => (new MausacControllers())->listMausacsanpham(),
        'deleteMausac' => (new MausacControllers())->deleteMausacsanpham(),
        'createMausac' => (new MausacControllers())->createMausacsanpham(),
        'postcreateMausanpham' => (new MausacControllers())->postcreateMausacsanpham(),
        'updateMausac' => (new MausacControllers())->updateMausacsanpham(),
        'postupdateMausanpham' => (new MausacControllers())->postupdateMausacsanpham(),
        // dung lượng
        'listdungluong' => (new DungluongControllers()) -> listdungluong(),
        'deleteDungluong' => (new DungluongControllers()) -> deleteDungluong(),
        'createDungluong' => (new DungluongControllers()) -> createDungluong(),
        'postcreateDungluong' => (new DungluongControllers()) -> postcreateDungluong(),
        'updateDungluong' => (new DungluongControllers()) -> updateDungluong(),
        'postupdateDungluong' => (new DungluongControllers()) -> postupdateDungluong(),
        // giá sản phẩm
        'listpriceProduct' => (new PriceControllers()) -> listprice(),
        'createPrice' => (new PriceControllers()) -> createPrice(),
        'postcreatePrice' => (new PriceControllers()) -> postcreatePrice(),
        'updatePrice' => (new PriceControllers()) -> updatePrice(),
        'postupdatePrice' => (new PriceControllers()) -> postupdatePrice(),
        'deletePrice' => (new PriceControllers()) -> deletePrice(),
        // biến thể sản phẩm
        'listProductDetail' => (new ProductDetailControllers()) -> listProductDetail($page),
        'createDetail' => (new ProductDetailControllers()) -> createDetail(),
        'postcreateDetail' => (new ProductDetailControllers()) -> postcreateDetail(),
        'updateDetail' => (new ProductDetailControllers()) -> updateDetail(),
        'postupdateDetail' => (new ProductDetailControllers()) -> postupdateDetail(),
        'deleteDetail' => (new ProductDetailControllers()) ->  deleteDetail(),
        // giao diện client
        // nav
        'listsanphamDanhmuc' => (new ClientController()) -> listsanphamDanhmuc(), 
        'listSanphamDanhMucMe' => (new ClientController()) -> listSanphamDanhMucMe(),
        'ChitietProduct' => (new ClientController()) -> ChitietProduct(),
        'chitietUser' => (new ClientController()) -> chitietUser(),
        //taikhoan
        'dangnhap' => (new TaikhoanControllers)-> dangnhap(),
        'dangky' => (new TaikhoanControllers())-> dangky(),
        'postdangky' => (new TaikhoanControllers())-> postDangky(),
        'dangnhap' => (new TaikhoanControllers())-> dangnhap(),
        'post-dangnhap' => (new TaikhoanControllers())-> postDangnhap(),
        'dangxuat' => (new TaikhoanControllers())-> postDangxuat(),
        'listtk' => (new TaikhoanControllers())-> listtk(),
        'deleteTk' => (new TaikhoanControllers())-> delete_tk(),
        'updateUser' => (new TaikhoanControllers())-> updateTk(),
        'postUpdateUser'  => (new TaikhoanControllers())-> postupdateTk(),
    };
    

