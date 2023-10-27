SELECT customers.name AS "Nama Pelanggan",
       COUNT(CASE WHEN shipments.status = 'sent' THEN 1 ELSE NULL END) AS "Pengiriman Berhasil",
       COUNT(CASE WHEN shipments.status = 'cancel' THEN 1 ELSE NULL END) AS "Pengiriman Gagal"
FROM customers
JOIN orders ON customers.id = orders.customer_id
JOIN shipments ON orders.id = shipments.order_id
WHERE customers.address LIKE '%Bekasi%'
  AND shipments.created_at >= '2022-01-01'
  AND shipments.created_at <= '2022-04-30'
GROUP BY customers.name;
