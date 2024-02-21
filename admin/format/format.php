<?php
function format_order_type($value)
{
  $text = '';
  if ($value == 1) {
    echo "Thanh toán khi nhận hàng (COD)";
  } elseif ($value == 2) {
    echo "Thanh toán MOMO QR CODE";
  } elseif ($value == 3) {
    echo "Thanh toán chuyển khoản MoMo";
  } elseif ($value == 4) {
    echo "Thanh toán chuyển khoản VNPAY";
  } elseif ($value == 5) {
    echo "Mua hàng trực tiếp";
  }
  echo $text;
}

function format_order_status($value)
{
  $text = '';
  if ($value == -1) {
    $text = 'Đơn hàng đã hủy';
  } elseif ($value == 0) {
    $text = 'Đang xử lý';
  } elseif ($value == 1) {
    $text = 'Đang chuẩn bị';
  } elseif ($value == 2) {
    $text = 'Đang giao hàng';
  } elseif ($value == 3) {
    $text = 'Đã giao hàng';
  } elseif ($value == 4) {
    $text = 'Đơn hàng hoàn trả';
  } else {
    $text = 'Đã hoàn thành';
  }
  echo $text;
}

function format_collection_type($value)
{
  $text = '';
  if ($value == 0) {
    $text = 'Tùy chọn sản phẩm';
  } else {
    $text = 'Sắp xếp theo từ khóa';
  }
  echo $text;
}

function format_account_type($value)
{
  $text = '';
  if ($value == 0) {
    $text = 'Khách hàng';
  } elseif ($value == 1) {
    $text = 'Nhân viên';
  } 
  else {
    $text = 'Quản trị viên';
  }
  echo $text;
}

function format_account_status($value)
{
  $text = '';
  if ($value == -1) {
    $text = 'Tạm khóa';
  } else {
    $text = 'Đang hoạt động';
  }
  echo $text;
}


function format_article_status($value)
{
  $text = '';
  if ($value == 0) {
    $text = 'Bản nháp';
  } else {
    $text = 'Xuất bản';
  }
  echo $text;
}

function format_comment_status($value)
{
  $text = '';
  if ($value == 0) {
    $text = 'Cần phê duyệt';
  } else {
    $text = 'Đã phê duệt';
  }
  echo $text;
}

function format_gender($value)
{
  $text = '';
  if ($value == 1) {
    $text = 'Nam';
  } elseif ($value == 2) {
    $text = 'Nữ';
  } else {
    $text = 'Chưa xác định';
  }
  echo $text;
}

//fomat date time 
function format_datetime($value)
{
  $timestamp = strtotime($value);
  $date = new DateTime();
  $date->setTimestamp($timestamp);

  $formattedDate = $date->format('Y-m-d H:i:s');
  echo $formattedDate;
}

// format 
function format_status_style($value) {
  $class = '';
  if ($value == -1) {
    $class = 'color-bg-red';
  } elseif ($value == 0) {
    $class = 'color-bg-orange';
  } elseif ($value == 1) {
    $class = 'color-bg-yellow';
  } elseif ($value == 2) {
    $class = 'color-bg-blue';
  } else {
    $class = 'color-bg-green';
  }
  echo $class;
}

function format_quantity_style($value) {
  $class = '';
  if ($value < 5) {
    $class = 'color-t-red';
  }
  echo $class;
}

function format_evaluate_status($value)
{
  $text = '';
  if ($value == -1) {
    $text = 'Tiêu cực';
  } else {
    $text = 'Tích cực';
  }
  echo $text;
}

function format_evaluate_style($value)
{
  $class = '';
  if ($value == -1) {
    $class = 'color-bg-red';
  } else {
    $class = 'color-bg-green';
  }
  echo $class;
}