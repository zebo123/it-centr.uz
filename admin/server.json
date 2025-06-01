const express = require('express');
const admin = require('firebase-admin');
const twilio = require('twilio');
const app = express();
app.use(express.json());

// 1. Инициализация Firebase
const serviceAccount = require('./serviceAccountKey.json');
admin.initializeApp({
  credential: admin.credential.cert(serviceAccount)
});
const db = admin.firestore();

// 2. Инициализация Twilio
const twilioClient = new twilio(
  process.env.TWILIO_SID, 
  process.env.TWILIO_AUTH_TOKEN
);

// 3. Обработчик платежей от Click
app.post('/click-webhook', async (req, res) => {
  try {
    const { amount, user_id } = req.body;

    // Проверяем подпись запроса (безопасность)
    const signString = [
      req.body.click_trans_id,
      req.body.service_id,
      req.body.merchant_trans_id,
      req.body.amount,
      req.body.action,
      req.body.sign_time
    ].join(':');
    
    const sign = crypto
      .createHash('sha1')
      .update(signString + process.env.CLICK_SECRET)
      .digest('hex');

    if (sign !== req.body.sign_string) {
      return res.status(400).send('Invalid signature');
    }

    // Сохраняем транзакцию
    await db.collection('transactions').add({
      user_id: user_id,
      amount: amount,
      type: 'deposit',
      status: 'pending',
      created_at: admin.firestore.FieldValue.serverTimestamp()
    });

    // Отправляем SMS администратору
    await twilioClient.messages.create({
      body: `НОВЫЙ ПЛАТЕЖ: Пользователь ${user_id} пополнил баланс на ${amount} UZS`,
      from: '+998550001122', // Номер Twilio
      to: process.env.ADMIN_PHONE // Ваш номер
    });

    res.status(200).send('OK');
  } catch (error) {
    console.error(error);
    res.status(500).send('Server error');
  }
});

// 4. Запуск сервера
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Сервер запущен на порту ${PORT}`);
});