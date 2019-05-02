alter table album add url varchar(255);

update album set url = 'https://www.amazon.com/dp/B000A2APUS/ref=cm_sw_em_r_mt_dp_U_p9UYCb3TZ24FV' where albumtitle = 'Time Well Wasted'; /*time well wasted*/
update album set url = 'https://www.amazon.com/dp/B01KAU7NY0/ref=cm_sw_r_tw_dp_U_x_arVYCbGN9CCZX' where albumartist = 'Toby Keith'; /*honkeytonk university*/
update album set url = 'https://www.amazon.com/dp/B00KYBBSQK/ref=cm_sw_em_r_mt_dp_U_ykVYCbJX0Y5D0' where albumtitle = 'The Legend of Johnny Cash'; /*johnny cash*/
update album set url = 'https://www.amazon.com/dp/B00L47E644/ref=cm_sw_em_r_mt_dp_U_1kVYCb2QDTY1C' where albumtitle = 'The Road and the Radio'; /*road and the radio*/
update album set url = 'https://www.amazon.com/dp/B0007M223Y/ref=cm_sw_em_r_mt_dp_U_KlVYCb42PBF7S' where albumartist= 'Craig Morgan'; /*craig morgan*/
update album set url = 'https://www.amazon.com/dp/B0009A21WG/ref=cm_sw_r_tw_dp_U_x_0mVYCbGVQTD6M' where albumartist = 'Oasis'; /*oasis */
update album set url = 'https://www.amazon.com/dp/B00DQAM5LI/ref=cm_sw_em_r_mt_dp_U_SnVYCbP54XXWF' where albumtitle = 'Hail to the King'; /*avenged sevenfold */
update album set url = 'https://www.amazon.com/dp/B012SVTUJ0/ref=cm_sw_em_r_mt_dp_U_voVYCbY3FTRTE' where albumtitle = 'When the Sun Goes Down'; /*when the sun goes down*/
update album set url = 'https://www.amazon.com/dp/B06WWKZ26S/ref=cm_sw_em_r_mt_dp_U_gpVYCbM9PC839' where albumtitle = 'Poison the Parish'; /*seether */
update album set url = 'https://www.amazon.com/dp/B0009HLDFU/ref=cm_sw_em_r_mt_dp_U_rqVYCbMFMXMS2' where albumtitle = 'In Your Honor'; /*foo fighters */

/* If you get error code 1175 you need to go to edit  click the sql editor tab and then uncheck safe updates at the bottom and then reconnect to the db


Error Code: 1175. You are using safe update mode and you tried to update a table without a WHERE that uses a KEY column To disable safe mode, toggle the option in Preferences -> SQL Editor and reconnect.*/


