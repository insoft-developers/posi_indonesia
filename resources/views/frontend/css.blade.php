@if ($view == 'ujian')
    <style>

    </style>
@endif

<style>
    .register-label {
        font-size: 12px !important;
        font-weight: 600;
        margin-bottom: 7px !important;
        margin-left: 4px;
    }

    .single-blog .blog-content .title a {
        font-size: 16px;
        font-weight: 500;
        color: #212832;
        margin-top: 13px;
        display: inline-block;
        line-height: 1.55;
        min-height: 83px !important;
    }

    .table-mobile {
        display: none;
    }

    .table-desktop {
        width: 100% !important;
        display: inline-table;
    }

    @media print {
        .ujian-sekarang {
            display: none !important;
        }
    }

    .gambar-kompetisi {
        height: 280px;
        object-fit: cover;
    }

    .item-item {
        background-color: white !important;
        opacity: 0.98;
    }

    .pembahasan-title {
        font-weight: bold;
        background: white;
        text-align: center;
        width: 80%;
        margin: auto;
        margin-bottom: 16px;
        padding: 10px 20px 10px 20px;
        border-radius: 5px;
    }



    .title-one {}

    .title-two {
        margin-top: -21px;
    }

    .pembahasan-item {
        /* background-color: white; */
        padding: 25px 35px 25px 35px;
        margin-bottom: 21px !important;
        border-radius: 5px;
        text-align: justify;
        width: 80%;
        margin: auto;
        background: linear-gradient(rgb(255 255 255), rgb(255 255 255 / 88%)), url(/template/frontend/assets/umum/logo_600.png);
        background-size: contain;

    }



    .pembahasan-no-soal {
        font-weight: bold;
        font-size: 16px;
    }

    .pembahasan-soal {
        font-size: 14px;


        font-weight: 600;
        margin-bottom: 10px;
    }

    .pembahasan-opt-a {
        font-size: 13px;
        margin-bottom: 3px;
    }

    .pembahasan-option-a {
        font-size: 13px;
        margin-bottom: 3px;
    }


    .pembahasan-jawaban {
        font-size: 13px;
        margin-bottom: 3px;
        font-weight: bold;
        margin-top: 10px;
    }

    .pembahasan-pembahasan {
        font-size: 13px;
        margin-bottom: 3px;
    }

    . .ongkir-form {
        background: whitesmoke;
        padding: 17px 44px;
        border-radius: 10px;
    }

    .bonus-text {
        font-size: 12px;
        color: blue;
    }

    .bonus-text2 {
        font-size: 12px;
        color: orange;
    }

    #btn-email-verif {
        background: whitesmoke;
        padding: 10px 10px;
        border: 2px solid #cdc1c1;
        border-radius: 16px;
        font-size: 14px;
        position: relative;
        margin-top: 13px;
        display: block;
        width: 187px;
        text-align: center;
        cursor: pointer;
    }

    .btn-cart-delete {
        margin-top: 40px;
    }

    .cart-total-price {
        position: relative;
        top: 40px;
        left: 19px;
    }

    .tambahan-unit {
        position: relative;
        left: 39%;
        margin-top: 15%;
    }

    .btn-tambah-unit {
        background: white;
        padding: 3px 7px;
        border-radius: 5px;
        cursor: pointer;
        background: green;
        color: white;
        font-weight: bold;
        margin-left: 11px;
    }

    .btn-kurang-unit {
        background: white;
        padding: 3px 8px;
        border-radius: 5px;
        cursor: pointer;
        background: green;
        color: white;
        font-weight: bold;
        margin-right: 11px;
    }

    .unit-cart {
        background: white;
        padding: 4px 21px;
        border-radius: 4px;
        font-weight: bold;
        font-size: 13px;
        border: 1px solid grey;
    }

    .product-check {
        font-size: 28px;
        color: green;

        padding: 5px 9px;
        border-radius: 31px;
    }

    .product-selected {
        background: whitesmoke !important;
    }

    .img-product-pengumuman {
        object-fit: cover;
        height: 36px;
        margin-top: 49%;
        right: 7px;
    }

    .item-product-price {
        font-size: 14px;
        font-weight: bold;
        color: green;
    }

    .item-product-list {
        font-size: 14px;
        font-weight: bold;
    }

    .item-product-desc {
        font-size: 14px;
        color: blue;

    }

    .product-row {
        border: 2px solid whitesmoke;
        margin: 10px 10px;
        border-radius: 5px;
        padding: 10px 10px;
        cursor: pointer;
    }




    .search-text {
        border: 2px solid #2e303b;
        left: 11px;
        width: 791px;
        position: relative;
        font-size: 14px;
        text-align: center;
    }

    .nilai-medali {
        position: relative;
        right: -41px;
        color: white;
        font-weight: bold;
        font-size: 21px;
        top: 5px;
    }

    .img-rippon {
        position: relative;
        right: -81px;
        height: 72px;
        top: 5px;
        width: 57px;
        object-fit: cover;
    }

    .ann-name {
        font-size: 15px;
        font-weight: bold;
        color: #151824;
    }


    .ann-school {
        font-size: 12px
    }

    .ann-province {
        font-size: 12px
    }

    .row-pengumuman {
        border: 2px solid whitesmoke;
        margin: 10px 64px 10px 10px;
        padding: 9px 0px;
        border-radius: 5px;
        cursor: pointer;
    }

    .row-pengumuman:hover {
        background: whitesmoke;
        transform: scale(1.01);
    }

    .img-medali {


        height: 58px;
        object-fit: cover;


    }

    .pengumuman-item {}

    .wa-chat {
        position: fixed;

        right: 24px;
        bottom: 127px !important;
        width: 67px;
        height: 67px;
        z-index: 999999;
        cursor: pointer;
    }

    .user-name-display {
        font-size: 27px !important;
        position: relative;
        left: 127px;
        top: -85px;
        font-weight: bold;
    }

    .img-google {
        width: 30px;
        height: 30px;
        margin-right: 14px;
    }

    .login-google {
        border: 2px solid #dfdfdf;
        width: 100%;
        height: 63px;
    }

    .login-title {
        font-size: 12px;
        margin-bottom: 6px;
    }

    .kartu {
        padding: 14px;
        border: 2px solid whitesmoke;
        border-radius: 15px;
    }

    .form-check-label {
        font-size: 14px;
        font-weight: bold;
    }

    .form-check {
        display: inline;
    }

    #radio-username-c {}

    #radio-email-c {
        margin-left: 30px;
    }

    #radio-wa-c {
        margin-left: 30px;
    }

    .im-note {
        margin-top: 10px;
    }

    .im-note-text {
        font-size: 14px;
        color: #2b324e;
        font-weight: 400;
    }

    .im-note-text a {
        font-weight: bold;
        color: #2b324e;
        font-size: 16px;
        text-decoration: underline;
    }

    .register-input {
        padding: 0px 15px !important;
        height: 45px !important;
    }

    .page-banner {
        height: 0px !important;
    }

    .courses-select {
        padding-top: 0px !important;
    }

    .courses-select .nice-select {
        font-weight: normal !important;
        font-size: 15px !important;
        width: 100% !important;
    }

    .text-red-600 {
        color: red;
    }

    .profile-image {
        height: 58px;
        border-radius: 29px;
        border: 4px solid whitesmoke;
        cursor: pointer;
        position: relative;
        top: 0px;
        right: -55px;

        background: #e9e9e9;
    }

    .profile-image-i {

        width: 115px;
        height: 115px;
        object-fit: cover;
        padding: 5px;
        background: whitesmoke;
        border-radius: 60px;
        cursor: pointer;

    }

    .menu-user {
        position: absolute !important;
        right: -1000px !important;
    }

    .sisa-hari {
        margin-top: 7px;
        font-size: 11px !important;
        font-weight: bold !important;
        color: green !important;
    }

    .blog-note {
        font-size: 13px !important;
        margin-left: 24px;
        margin-top: 4px;
    }

    .garis {
        margin-top: 8px;
        height: 2px;
        background-color: whitesmoke;
    }

    .foot-note {
        position: relative;
        right: -128px;
        top: 17px;
        font-size: 12px;
        /* font-weight: bold; */
        color: #808080b0;
    }

    .modal-sm {
        width: 300px !important;
    }

    .modal-600 {
        width: 500px !important;
    }

    .modal-800 {
        width: 800px !important;
    }

    .modal-500 {
        width: 400px !important;
    }

    .tombol-daftar {
        background: #f5fff9;
        padding-top: 15px;
        padding-bottom: 15px;
        margin-bottom: 19px;
        border-radius: 40px;
        cursor: pointer;
        font-size: 14px;
    }

    .tombol-daftar:hover {
        background-color: blue;
        color: white;
    }

    .modal-transparent {
        background: transparent;
        border: 0px !important;
    }

    .modal-head-title {
        font-size: 16px !important;
    }

    .modal-subtitle {
        font-size: 13px;
        font-weight: bold;
        margin-top: 1px;
        color: green;

    }

    .image-pendaftaran {
        width: 40px;
        height: 40px;
        background: beige;
        margin-top: 17px;
        padding: 4px;
        border-radius: 25px;
    }

    .detail-name {
        font-size: 14px;
        font-weight: bold;
    }

    .detail-date {
        font-weight: normal;
        font-size: 14px;
    }

    .detail-time {
        font-weight: bold;
        font-size: 12px;

    }

    .baris {
        cursor: pointer;
    }

    .baris:hover {
        background-color: whitesmoke;

    }

    .baris-active {
        background-color: lightseagreen !important;
        color: white !important;
    }

    .cart-number {
        position: relative;
        top: -18px;
        right: -37px;
        font-size: 10px;
        background: red;
        font-weight: bold;
        color: white;
        padding: 3px 7px 3px 7px;
        border-radius: 30px;
    }

    .notif-number {
        position: relative;
        top: -18px;
        right: -37px;
        font-size: 10px;
        background: red;
        font-weight: bold;
        color: white;
        padding: 3px 6px 3px 6px;
        border-radius: 30px;
    }

    .image-pilih {
        background: orange;
        color: white;
        font-size: 12px;
        padding: 6px 10px 6px 10px;
        border-top-right-radius: 18px;
        border-bottom-right-radius: 18px;
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px;
    }

    .image-register {
        background: red;
        color: white;
        font-size: 12px;
        padding: 6px 10px 6px 10px;
        border-top-right-radius: 18px;
        border-bottom-right-radius: 18px;
        border-top-left-radius: 8px;
        border-bottom-left-radius: 8px;
    }

    .image-cart {
        width: 60px;
        height: 60px;
        object-fit: cover;
        padding: 4px;
        background: #e7f8ee;
        border-radius: 10px;
        border: 1px solid green;
    }

    .btn-insoft {
        font-size: 11px;
        padding: 2px 7px 2px 7px;
        border-radius: 5px;
        border: 0px !important;
    }

    .bg-danger {
        background-color: darkred;
        color: white;
    }

    .bg-success {
        background-color: green;
        color: white;
    }

    .total-harga {
        margin-bottom: 30px;
        background: cadetblue;
        color: white;
        padding: 17px;
        width: 24%;
        border-radius: 5px;
        font-size: 23px;
        font-weight: bold;
    }

    .btn-order {
        float: right;
        position: relative;
        bottom: 88px;
        font-size: 16px;
        border: 0px;
        font-family: sans-serif;
        padding: 10px 15px 10px 15px;
        border-radius: 5px;
        background: green;
        color: white;
    }

    .empty-image {
        width: 300px;
        margin-bottom: 30px;
    }

    .upload-image {
        width: 220px;
        height: 234px;
        cursor: pointer;
        border: 2px solid whitesmoke;
        padding: 26px;
        border-radius: 10px;
        object-fit: contain;
    }

    .image-bukti {
        width: 100px;
        height: 120px;
        object-fit: cover;
        border: 2px solid whitesmoke;
        padding: 5px;
        border-radus: 10px;
    }

    .upload-click {

        font-size: 12px;
    }

    .small-upload {
        width: 18px;
    }

    .upload-syarat {
        display: block;
        width: 100%;
        border: 6px solid whitesmoke;
        padding: 17px;
        border-radius: 12px;
        height: 264px;
        object-fit: contain;
        position: relative;

        cursor: pointer;
    }

    .label-form {
        font-size: 14px !important;
        margin-bottom: 3px !important;
        color: orange !important;
        font-weight: bold;

    }

    .nice-select {
        display: none !important;
    }

    select {
        display: block !important;
        height: 60px;
        width: 100%;
        border-radius: 10px;
        border: 1.8px solid #d6e9dd;
        padding: 0px 0px 0px 23px;
        font-size: 15px;
        color: grey;
    }



    .select2-container--default .select2-selection--single {
        background-color: #fff;
        border: 1px solid #d6e9dd;
        border-radius: 10px;
        height: 60px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 60px;
        padding: 0px 0px 0px 30px;
    }

    .jadwal-image {
        height: 150px;
        border-top-left-radius: 10px;
        border-top-right-radius: 0px;
        border-bottom-left-radius: 0px;
        border-bottom-right-radius: 96px;

        margin-left: -14px;
        margin-top: -15px;
        width: 210px;
        object-fit: cover;
    }

    .jadwal-title {
        font-weight: bold;
        color: green;
    }

    .sub-info {
        font-size: 13px;
        margin-top: 6px;
    }

    .button-ujian {
        background: darkgreen;
        width: 136px;
        color: white;
        font-size: 12px;
        padding: 6px 10px 6px 10px;
        border-radius: 25px;
        text-align: center;
        margin-top: 12px;
        margin-left: 18px;
        cursor: pointer;
        border: 2px solid limegreen;
        font-weight: bold;
    }

    .button-selesai {
        background: red;
        width: 136px;
        color: white;
        font-size: 12px;
        padding: 6px 10px 6px 10px;
        border-radius: 25px;
        text-align: center;
        margin-top: 12px;
        margin-left: 18px;
        cursor: pointer;
        border: 2px solid red;
        font-weight: bold;
    }

    .waktu-ujian {
        font-weight: bold;
        font-size: 19px;
        color: red;
        background: white;
        padding: 0px 46px;
        border-radius: 8px;
        border: 2px solid red;
        font-family: monospace;
        position: relative;
        top: -44px;
        left: 456px;
        margin-bottom: -32px !important;
    }

    .ujian-header {
        font-size: 18px;
        font-weight: bold;
        color: #2b324e;
    }

    .no-soal {
        font-weight: 900;
        font-size: 25px;
        color: #2b324e;
        text-decoration: underline;
    }


    .pilih-jawaban {
        font-weight: 700;
        font-size: 16px;
        color: #2b324e;
        text-decoration: underline;
    }

    .jawaban-item {
        border: 2px solid whitesmoke;
        margin-bottom: 15px;
        padding: 5px 15px;
        border-radius: 10px;
        font-size: 15px;
        cursor: pointer;
    }

    .jawaban-item:hover {
        border: 2px solid orange;
        margin-bottom: 15px;
        padding: 5px 15px;
        border-radius: 10px;
        font-size: 15px;
        background: #2a3049;
        color: white;
    }

    .selected-jawaban {
        border: 2px solid orange;
        margin-bottom: 15px;
        padding: 5px 15px;
        border-radius: 10px;
        font-size: 15px;
        background: #2a3049;
        color: white;
    }

    .jawaban-wrapper {
        margin-top: 40px;
    }

    .soal-title {
        font-weight: bold;
        font-size: 17px;
        line-height: 32px;
        text-align: justify;
    }

    .btn-simpan-insoft {
        border: 3px solid orange;
        font-size: 16px;
        background: darkred;
        padding: 7px 20px;
        border-radius: 29px 29px;
        font-weight: bold;
        color: white;
        margin-left: 40px;
    }

    .btn-sebelumnya-insoft {
        border: 3px solid mediumslateblue;
        font-size: 16px;
        background: lightskyblue;
        padding: 7px 20px;
        border-radius: 17px 17px;
        font-weight: bold;
    }

    .btn-selanjutnya-insoft {
        border: 3px solid #68eedb;
        font-size: 16px;
        background: #87fa95;
        padding: 7px 20px;
        border-radius: 17px 17px;
        font-weight: bold;
        margin-left: 15px !important;
    }

    .btn-selesai-insoft {
        border: 3px solid green;
        font-size: 16px;
        background: greenyellow;
        padding: 7px 20px;
        border-radius: 17px 17px;
        font-weight: bold;
        float: right;
    }

    .lihat-soal {
        float: right;
        background: whitesmoke;
        padding: 10px 36px;
        border-radius: 6px;
    }

    .item-number {
        background: white;
        margin: 2px;
        padding: 2px 0px;
        text-align: center;
        cursor: pointer;
        font-size: 11px;
        font-weight: bold;
        border-radius: 8px;
        border: 2px solid #151824;
    }

    .gambar-soal {
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 10px;
    }

    .gambar-jawaban {
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 10px;
    }

    .item-number:hover {
        background-color: whitesmoke;
        transform: scale(1.2);
    }

    .item-number-active:hover {
        background-color: orange;
        color: white;
        transform: scale(0.8);
    }

    .nomor-soal-container {
        position: relative;
        left: -65px;
    }

    .item-number-active {
        background: #151824;
        color: white;
        margin: 2px;
        padding: 2px 0px;
        text-align: center;
        cursor: pointer;
        font-size: 11px;
        font-weight: bold;
        border-radius: 8px;
        border: 2px solid whitesmoke;
    }

    .content-number {
        position: relative;
        left: 7%;
        right: auto;
    }

    .main-judul {
        margin-bottom: -28px;
        font-weight: bold;
        font-size: 20px;
        margin-top: 22px;
        color: #2a3049;
        text-decoration: underline;
    }

    .img-pengumuman {
        object-fit: cover;
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        border-top-right-radius: 0px;
        border-bottom-right-radius: 128px;
        height: 274px;
        position: relative;
        margin: -15px !important;
        width: 360px;
    }

    .box-pengumuman {
        background-image: url("{{ asset('template/frontend/assets/umum/bgaja.png') }}");
        background-position: right center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .study-item {
        margin-bottom: 22px;
        margin-left: 0px;
        cursor: pointer;
        font-size: 14px;

    }

    .study-item:hover {
        text-decoration: underline;

    }

    .bagian-dua {
        padding: 10px 50px;
    }

    .pos-icon {
        margin-top: 7px;
    }

    .single-blog {
        background-color: white !important;
    }

    .register-login-images {
        background: white;
        border-radius: 110px;
        padding: 25px 71px;
    }

    .title-pengumuman {
        font-size: 15px;
        font-weight: bold;
        margin-top: -14px;
    }

    .subtitle-pengumuman {
        font-size: 14px;
        margin-top: -2px;
        margin-bottom: 14px;
    }

    .timeline-title {
        font-size: 16px !important;
        text-transform: capitalize !important;
        margin-bottom: 0px !important;
        position: relative;
        top: -3px;
    }

    .timeline-subtitle {
        font-size: 13px;
        margin-top: -4px;
    }

    .riwayat-tools {


        border: 2px solid whitesmoke;
        padding: 5px;
        border-radius: 10px 37px 37px 10px;

        margin-top: 6px;
        cursor: pointer;


    }

    .riwayat-tools-image {
        width: 26px;
        height: 26px;
        margin-right: 12px;
        /* border: 2px solid #3bbdc7; */
        border-radius: 13px;
        /* padding: 4px; */
        cursor: pointer;

    }

    .riwayat-text {}

    .riwayat-tools:hover {
        background: lightblue;
        border: 2px solid orange;
    }



    .icon-telegram {
        width: 20px;

        border-radius: 13px;
        padding: 2px;
        margin-right: 5px;
        margin-top: -3px;
    }

    .icon-utama {
        width: 18px;
        border-radius: 17px;
        padding: 1px;
        margin-top: -3px;
        /* border: 2px solid #53b8ed; */
    }

    .icon-n {
        width: 26px;
        border-radius: 17px;

        margin-top: -3px;

    }

    .vertical-timeline--animate .vertical-timeline-element-icon.bounce-in {
        background: transparent !important;
    }

    .timeline-icons {
        width: 17px;
    }

    #isi-nomor {}
</style>

@if ($view == 'main' || $view == 'jadwal')
    <style>
        body {
            background-color: #fbf9ff;
        }
    </style>
@endif

@if ($view == 'jadwal')
    <style>
        .single-blog {
            padding: 15px !important;
        }
    </style>
@endif


@if ($view == 'transaction')
    <style>
        .dt-length {
            display: none;
        }
    </style>
@endif

@if ($view == 'riwayat')
    <style>
        body {
            background-color: #fbf9ff;
        }

        .mt-70 {
            margin-top: 70px;
        }

        .mb-70 {
            margin-bottom: 70px;
        }

        .card {
            box-shadow: 0 0.46875rem 2.1875rem rgba(4, 9, 20, 0.03), 0 0.9375rem 1.40625rem rgba(4, 9, 20, 0.03), 0 0.25rem 0.53125rem rgba(4, 9, 20, 0.05), 0 0.125rem 0.1875rem rgba(4, 9, 20, 0.03);
            border-width: 0;
            transition: all .2s;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(26, 54, 126, 0.125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            padding: 1.25rem;
        }

        .vertical-timeline {
            width: 100%;
            position: relative;
            padding: 1.5rem 0 1rem;
            margin-left: -61px;
        }

        .vertical-timeline::before {
            content: '';
            position: absolute;
            top: 0;
            left: 67px;
            height: 100%;
            width: 4px;
            background: #e9ecef;
            border-radius: .25rem;
        }

        .vertical-timeline-element {
            position: relative;
            margin: -12px 0 0 0px;
        }

        .vertical-timeline--animate .vertical-timeline-element-icon.bounce-in {
            visibility: visible;
            animation: cd-bounce-1 .8s;

            border: 3px solid #e9ecef;
            padding: 5px;
            border-radius: 23px;
            line-height: 10px;
            margin-left: -6px;
            margin-top: -5px;
            background: #e83435;
            color: white;
        }

        .vertical-timeline-element-icon {
            position: absolute;
            top: 0;
            left: 60px;
        }

        .vertical-timeline-element-icon .badge-dot-xl {
            box-shadow: 0 0 0 5px #fff;
        }

        .badge-dot-xl {
            width: 18px;
            height: 18px;
            position: relative;
        }

        .badge:empty {
            display: none;
        }


        .badge-dot-xl::before {
            content: '';
            width: 10px;
            height: 10px;
            border-radius: .25rem;
            position: absolute;
            left: 50%;
            top: 50%;
            margin: -5px 0 0 -5px;
            background: #fff;
        }

        .vertical-timeline-element-content {
            position: relative;
            margin-left: 90px;
            font-size: .8rem;
        }

        .vertical-timeline-element-content .timeline-title {
            font-size: .8rem;
            text-transform: uppercase;
            margin: 0 0 .5rem;
            padding: 2px 0 0;
            font-weight: bold;
        }

        .vertical-timeline-element-content .vertical-timeline-element-date {
            display: block;
            position: absolute;
            left: -90px;
            top: 0;
            padding-right: 10px;
            text-align: right;
            color: #adb5bd;
            font-size: .7619rem;
            white-space: nowrap;
        }

        .vertical-timeline-element-content:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
@endif

@if ($view !== 'home')
    <style>
        @media only screen and (max-width: 768px) {
            .wa-chat {
                display: none;
            }
        }
    </style>
@endif

<style>
    @media only screen and (max-width: 768px) {

        .img-pengumuman {
            object-fit: cover;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            border-top-right-radius: 128px;
            border-bottom-right-radius: 128px;
            height: 51px;
            position: relative;
            margin: -15px !important;
            width: 153px;
            top: -26px;
            border: 4px solid whitesmoke;
        }

        .table-desktop {
            display: none;
        }

        .table-mobile {
            display: inherit;
        }

        .item-number {
            background: white;
            margin: 2px;
            padding: 2px 0px;
            text-align: center;
            cursor: pointer;
            font-size: 11px;
            font-weight: bold;
            border-radius: 8px;
            border: 2px solid #151824;
            width: 40px;
        }

        .item-number-active {
            background: #151824;
            color: white;
            margin: 2px;
            padding: 2px 0px;
            text-align: center;
            cursor: pointer;
            font-size: 11px;
            font-weight: bold;
            border-radius: 8px;
            border: 2px solid whitesmoke;
            width: 40px;
        }

        .btn-simpan-insoft {
            border: 3px solid orange;
            font-size: 12px;
            background: darkred;
            padding: 7px 20px;
            border-radius: 29px 29px;
            font-weight: bold;
            color: white;
            position: relative;
            left: -39px;
            top: 13px;

        }

        .btn-sebelumnya-insoft {
            border: 3px solid mediumslateblue;
            font-size: 12px;
            background: lightskyblue;
            padding: 7px 20px;
            border-radius: 17px 17px;
            font-weight: bold;
        }

        .btn-selanjutnya-insoft {
            border: 3px solid #68eedb;
            font-size: 12px;
            background: #87fa95;
            padding: 7px 20px;
            border-radius: 17px 17px;
            font-weight: bold;
            margin-left: 15px !important;
            float: right;
        }

        .btn-selesai-insoft {
            border: 3px solid green;
            font-size: 12px;
            background: greenyellow;
            padding: 7px 20px;
            border-radius: 17px 17px;
            font-weight: bold;
            float: right;
            margin-top: 12px;
        }

        .ujian-sekarang {
            margin-top: 40px;
        }

        .waktu-ujian {


            font-weight: bold;
            font-size: 19px;
            color: red;
            background: white;
            padding: 0px 46px;
            padding-right: 46px;
            padding-left: 46px;
            border-radius: 8px;
            border: 2px solid red;
            font-family: monospace;
            position: relative;
            top: -36px;
            left: 127px;
            margin-bottom: -32px !important;
            padding-right: 11px;
            padding-left: 8px;
        }

        .content-number {
            display: none;
        }

        .cart-total-price {
            position: relative;
            top: 87px;
            left: -2px;
            font-size: 14px;
            display: block;
            width: 165% !important;
        }

        .unit-cart {
            background: white;
            padding: 4px 15px;
            border-radius: 4px;
            font-weight: bold;
            font-size: 13px;
            border: 1px solid grey;
        }

        .btn-tambah-unit {
            background: white;
            padding: 3px 7px;
            border-radius: 5px;
            cursor: pointer;
            background: green;
            color: white;
            font-weight: bold;
            margin-left: 26px;
            top: -21px;
            position: relative;
            left: 10px;
        }

        .row-pengumuman {
            border: 2px solid whitesmoke;
            margin: 10px 64px 10px 10px;
            padding: 9px 0px;
            border-radius: 5px;
            cursor: pointer;
            width: 94%;
        }

        .search-text {
            border: 2px solid #2e303b;
            left: 11px;
            width: 94%;
            position: relative;
            font-size: 14px;
            text-align: center;
            /* margin-right: 27px !important; */
        }

        .btn-kurang-unit {
            background: white;
            padding: 3px 8px;
            border-radius: 5px;
            cursor: pointer;
            background: green;
            background-color: green;
            color: white;
            font-weight: bold;
            margin-right: 11px;
            position: relative;
            top: 21px;
            left: -20px;
        }

        #grand-total {
            width: 200%;
            display: block;
        }

        .image-cart {
            display: none;
        }

        .image-pendaftaran {
            width: 40px;
            height: 28px;
            background: beige;
            margin-top: 17px;
            padding: 4px;
            border-radius: 25px;
        }

        .profile-image {
            height: 58px;
            border-radius: 29px;
            border: 4px solid whitesmoke;
            cursor: pointer;
            position: relative;
            left: 18px;
            background: #e9e9e9;
        }



        .m-name {
            position: relative;
            left: 30%;
            margin-top: -14%;
            font-weight: bold;
        }

        .m-level {
            position: relative;
            left: 110px;
            top: -105px;
            font-size: 11px;
        }

        .m-sekolah {
            font-size: 10px;
            left: 109px;
            position: relative;
            top: -132px;
        }

        #isi-nomor-mobile {
            margin-left: 20px;
        }

        .user-name-display {
            font-size: 18px !important;
            position: relative;
            left: 127px;
            top: -85px;
            font-weight: bold;
        }

        #table-transaction_wrapper {
            margin-top: 80px;
        }

        .detail-name {
            font-size: 12px;
            font-weight: bold;
        }

        .detail-date {
            font-weight: normal;
            font-size: 11px;
        }

        .detail-time {
            font-weight: bold;
            font-size: 11px;

        }

        #btn_simpan_gratis {
            position: relative;
            left: -46%;
        }

        #btn_simpan_premium {
            position: relative;
            left: -45%;
        }

        #btn-daftar-free {
            position: relative;
            left: -75%;
        }

        .main-judul {
            font-weight: bold;
            font-size: 20px;
            margin-top: 22px;
            color: #2a3049;
            text-decoration: underline;
            margin-bottom: 30px;
        }

        #table-transaction_wrapper {
            display: none;
        }

        .img-medali {
            height: 37px;
            object-fit: cover;
            position: relative;
            left: -14px;
        }

        .img-rippon {
            position: relative;
            right: 0;
            height: 72px;
            top: 5px;
            width: 57px;
            object-fit: cover;
        }

        .nilai-medali {
            position: relative;
            right: 38px;
            color: white;
            font-weight: bold;
            font-size: 21px;
            top: 5px;
        }

        .img-product-pengumuman {
            object-fit: cover;
            height: 36px;
            margin-top: 2%;
            right: 7px;
        }
    }
</style>
