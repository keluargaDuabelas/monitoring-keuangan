<!DOCTYPE html>
<html>
<head>
  <title>Surridge Sport Cards</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      font-family: 'Roboto', sans-serif;
      background-color: #f5f5f5;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .card {
      background-color: #ffffff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      padding: 32px;
      width: 1500px; /* Ukuran lebar tetap */
      box-sizing: border-box;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .card-title {
      font-size: 28px;
      font-weight: 500;
      margin-bottom: 16px;
      color: #1a237e;
    }

    .card-subtitle {
      font-size: 18px;
      font-weight: 400;
      color: #757575;
      margin-bottom: 20px;
    }

    .card-content {
      font-size: 16px;
      font-weight: 300;
      color: #424242;
      line-height: 1.6;
      margin-bottom: 24px;
    }

    .card-action {
      text-align: right;
    }

    .card-action a {
      display: inline-block;
      text-decoration: none;
      font-size: 16px;
      font-weight: 500;
      color: #1a237e;
      padding: 12px 24px;
      border-radius: 8px;
      background-color: #e8eaf6;
      transition: background-color 0.3s ease;
    }

    .card-action a:hover {
      background-color: #c5cae9;
    }

    .card-image {
      width: 100%;
      height: auto;
      border-radius: 8px;
      margin-bottom: 24px;
      object-fit: cover;
    }

    /* Tombol dan teks di tengah gambar */
    .card-image-container {
      position: relative;
      width: 100%;
    }

    .center-text {
      position: absolute;
      top: 40%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 24px;
      color: white;
      z-index: 2;
    }

    .center-button {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 12px 24px;
      background-color: #1a237e;
      color: #ffffff;
      text-decoration: none;
      font-weight: 500;
      border-radius: 8px;
      z-index: 2;
      transition: background-color 0.3s ease;
    }

    .center-button:hover {
      background-color: #3949ab;
    }

    /* Overlay pada gambar */
    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 1;
    }

    @media screen and (max-width: 768px) {
      .card {
        width: 100%;
        padding: 16px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card-image-container">
        <img class="card-image" src="image/kota.jpg" alt="Placeholder Image">

        <div class="center-text">Silahkan Login</div>
        <a href="#" class="center-button">Buy Now</a>
      </div>

    </div>
  </div>
</body>
</html>
