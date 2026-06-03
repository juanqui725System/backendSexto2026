-- Ejercicios UNCOMPRES
SELECT apellidos,nombre,telefono 
FROM clientes
ORDER BY apellidos,nombre;
-- ejercio dos
SELECT * 
FROM productos
WHERE stock<=50;
-- 3 ejercicio
SELECT *
FROM empleados
WHERE apellidos like "a%"
-- cliente mas su pedidos
SELECT 	c.nombre,
				c.apellidos,
				p.fecha_compra,
				p.cantidad
FROM pedidos AS p, clientes as c
WHERE c.Id = p.cod_cliente
-- otra forma
SELECT 	c.nombre,
				c.apellidos,
				p.fecha_compra,
				p.cantidad
FROM pedidos AS p
INNER JOIN clientes c ON c.Id = p.cod_cliente;
-- 005.

SELECT 	e.apellidos,
				e.nombre, 
				COUNT(e.id) as TotalVendido
FROM empleados e 
INNER JOIN pedidos p ON e.id=p.cod_empleado
GROUP BY e.id

SELECT 	e.apellidos,
				e.nombre, 
				COUNT(e.id) as TotalVendido
FROM empleados e 
LEFT JOIN pedidos p ON e.id=p.cod_empleado
GROUP BY e.id

-- OFFSET
SELECT  codBarras, descripcion,precio_unitario
FROM productos
ORDER BY precio_unitario DESC
