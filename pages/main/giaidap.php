<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Hỏi Đáp</title>
    <style>
        .faq-question {
            transition: all 0.3s ease;
        }
        .faq-question:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">
        <header class="text-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Câu hỏi thường gặp</h1>
        </header>
        <section class="faq-question mb-4 p-4 border border-gray-200 rounded-lg hover:bg-gray-100">
            <h3 class="text-xl font-semibold text-gray-700">Làm cách nào để tạo một tài khoản mới?</h3>
            <p class="mt-2 text-gray-600">Để tạo một tài khoản mới, bạn có thể thực hiện các bước sau:</p>
            <ul class="list-disc list-inside mt-2 text-gray-600">
                <li>Tạo tài khoản qua mục đăng ký.</li>
                <li>Nếu khi mua hàng bạn chưa có tài khoản, bạn có thể chọn đăng ký tài khoản để có thể mua hàng.</li>
            </ul>
        </section>
        <section class="faq-question mb-4 p-4 border border-gray-200 rounded-lg hover:bg-gray-100">
            <h3 class="text-xl font-semibold text-gray-700">Tôi quên mật khẩu của mình. Làm cách nào để đặt lại?</h3>
            <p class="mt-2 text-gray-600">Nếu bạn quên mật khẩu, bạn có thể sử dụng chức năng đặt lại mật khẩu tại trang đăng nhập.</p>
        </section>
        <section class="faq-question mb-4 p-4 border border-gray-200 rounded-lg hover:bg-gray-100">
            <h3 class="text-xl font-semibold text-gray-700">Làm cách nào để đặt hàng sản phẩm?</h3>
            <p class="mt-2 text-gray-600">Để đặt hàng sản phẩm, bạn có thể thêm sản phẩm vào giỏ hàng và tiến hành thanh toán theo hướng dẫn trên trang.</p>
        </section>
        <section class="faq-question mb-4 p-4 border border-gray-200 rounded-lg hover:bg-gray-100">
            <h3 class="text-xl font-semibold text-gray-700">Sản phẩm có thể được trả lại không?</h3>
            <p class="mt-2 text-gray-600">Có, chúng tôi chấp nhận việc trả lại sản phẩm trong khoảng thời gian nhất định sau khi nhận hàng. Bạn có thể liên hệ với chúng tôi qua mục liên hệ, nếu sản phẩm có lỗi do sản xuất chúng tôi sẽ có biện pháp hoàn trả.</p>
        </section>
    </div>
</body>
</html>