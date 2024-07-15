import 'package:flutter/material.dart';

class drawer extends StatelessWidget {
  const drawer({
    super.key,
  });

  @override
  Widget build(BuildContext context) {
    return Drawer(
      child: ListView(
        children: [
          ListTile(
            leading: Icon(Icons.home),
            title: Text('Beranda'),
            onTap: () {
              Navigator.pushNamed(context, '/home');
            },
          ),
          ListTile(
            leading: Icon(Icons.info),
            title: Text('Jadwal'),
            onTap: () {
              print("jadwal");
              Navigator.pushNamed(context, '/jadwal');
            },
          ),
          ListTile(
            leading: Icon(Icons.search),
            title: Text('Pesan'),
            onTap: () {
              print("pesan");
              Navigator.pushNamed(
                  context, '/pesan'); // Navigasi ke halaman Diagnosa
            },
          ),
          ListTile(
            leading: Icon(Icons.search),
            title: Text('Bukti Pemesanan'),
            onTap: () {
              Navigator.pushNamed(
                  context, '/bukti'); // Navigasi ke halaman Diagnosa
            },
          ),
        ],
      ),
      backgroundColor: Color.fromARGB(255, 51, 242, 242),
    );
  }
}
