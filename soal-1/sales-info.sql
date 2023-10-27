SELECT customers.name AS "Nama Pelanggan",
       customers.phone AS "Nomor Telepon",
       customers.address AS "Alamat Pelanggan",
       orders.code AS "Kode Pesanan",
       orders.resi_number AS "Nomor Resi",
       orders.created_at AS "Tanggal Pesanan",
       shipments.code AS "Kode Pengiriman",
       shipments.status AS "Status Pengiriman",
       shipments.created_at AS "Tanggal Pengiriman"
FROM customers
JOIN orders ON customers.id = orders.customer_id
JOIN shipments ON orders.id = shipments.order_id;
