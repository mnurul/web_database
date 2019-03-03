DELETE FROM gudang WHERE gudang_id = '2';

SELECT nama_gudang,tgl_input FROM gudang;

SELECT * FROM barang a inner JOIN  tipe b ON a.tipe_id = b.tipe_id;

SELECT * FROM barang a left JOIN  tipe b ON a.tipe_id = b.tipe_id;

SELECT * FROM barang a right JOIN  tipe b ON a.tipe_id = b.tipe_id;

SELECT * 
FROM barang a 
	left JOIN  tipe b 
	ON a.tipe_id = b.tipe_id 
	LEFT JOIN gudang c 
	ON a.gudang_id = c.gudang_id GROUP BY a.nama_barang;
	
SELECT * 
FROM barang a 
	left JOIN  tipe b 
	ON a.tipe_id = b.tipe_id 
	LEFT JOIN gudang c 
	ON a.gudang_id = c.gudang_id ORDER BY a.barang_id DESC;





