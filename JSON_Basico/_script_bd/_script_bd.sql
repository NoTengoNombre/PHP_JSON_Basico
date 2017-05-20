/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Portatil_Bot
 * Created: 20-may-2017
 */

CREATE TABLE `fruta` (
`id_fruta` int(6) not null auto_increment,
`nombre_fruta` varchar(25) not null,
`cantidad` int(50) not null,
primary key (`id_fruta`)
) engine=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


update fruta set cantidad=170 where id_fruta='2'
update fruta set cantidad=160 where nombre_fruta='manzana'
update fruta set id_fruta='1' where nombre_fruta='manzano'
update fruta set `nombre_fruta`='manzana' where `id_fruta`=1;
update fruta set `nombre_fruta`='platano' where id_fruta=2;
update fruta set cantidad=820 where `nombre_fruta` = 'pera'


