import 'package:flutter/material.dart';
import 'package:pakar/pages/bukti_pemesanan.dart';
import 'package:pakar/pages/detail_slip.dart';
import 'package:pakar/pages/home.dart';
import 'package:pakar/pages/login_page.dart';
import 'package:pakar/pages/register_page.dart';
import 'package:pakar/pages/pesan.dart';

import 'pages/Jadwal.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Login & Register',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      initialRoute: '/login',
      routes: {
        '/login': (context) => LoginPage(),
        '/register': (context) => RegisterPage(),
        '/home': (context) => Home(),
        '/jadwal': (context) => JadwalPage(),
        '/pesan': (context) => Pesan(),
        '/bukti': (context) => BuktiPemesanan(),
      },
    );
  }
}
