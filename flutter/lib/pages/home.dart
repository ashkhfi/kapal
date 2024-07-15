import 'package:flutter/material.dart';

import '../widgets/drawer.dart';

class Home extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Center(
          child: Text('Home'),
        ),
        backgroundColor: Color.fromARGB(255, 46, 183, 221),
      ),
      drawer: drawer(),
      body: Column(
        mainAxisAlignment: MainAxisAlignment.spaceBetween,
        children: [
          // Konten halaman home
          Expanded(
            child: Container(
              padding: EdgeInsets.all(16.0),
              child: SingleChildScrollView(
                child: Column(
                  children: [
                    // Gambar pertam
                    Text(
                      'PT ASDP Indonesia Ferry ( Persero)',
                      textAlign: TextAlign.center, // Posisi teks di tengah
                      style: TextStyle(
                        fontSize: 16.0,
                        fontWeight: FontWeight.bold,
                      ),
                    ),
                    Image.asset('assets/images/asdp.png'),
                    SizedBox(height: 16.0),
                  ],
                ),
              ),
            ),
          ),
          // Bar hijau
          Container(
            height: 50,
            color: Color.fromARGB(255, 11, 231, 235),
          ),
        ],
      ),
    );
  }
}
