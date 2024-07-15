import 'package:flutter/material.dart';

import '../models/tiket_model.dart';

class DetailSlip extends StatelessWidget {
  final Tiket tiket;
  const DetailSlip({super.key, required this.tiket});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(),
      body: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          Center(
            child: Text(
              "Bukti Pemesanan",
              style: TextStyle(fontSize: 30, fontWeight: FontWeight.bold),
            ),
          ),
          Container(
            margin: EdgeInsets.all(10),
            decoration: BoxDecoration(border: Border.all(width: 1)),
            child: Column(
              children: [
                ListTile(
                  title: Text("No Pemesanan"),
                  trailing: Text("TXT 0${tiket.Id}"),
                ),
                ListTile(
                  title: Text("Nama  Pemesan"),
                  trailing: Text("TXT 0${tiket.dataPenumpang}"),
                ),
                ListTile(
                  title: Text("Tanggal Berangkat"),
                  trailing: Text("TXT 0${tiket.Id}"),
                ),
                ListTile(
                  title: Text("Anak anak"),
                  trailing: Text("${tiket.anak}"),
                ),
                ListTile(
                  title: Text("Dewasa"),
                  trailing: Text("${tiket.dewasa}"),
                ),
                ListTile(
                  title: Text("Motor"),
                  trailing: Text("${tiket.motor}"),
                ),
                ListTile(
                  title: Text("Mobil"),
                  trailing: Text("${tiket.mobil}"),
                ),
                ListTile(
                  title: Text("Total"),
                  trailing: Text("Rp. ${tiket.hargaTiket}"),
                ),
              ],
            ),
          )
        ],
      ),
    );
  }
}
