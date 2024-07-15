import 'package:flutter/material.dart';
import 'package:pakar/api_helper.dart';
import 'package:pakar/models/jadwal_model.dart';
import 'package:pakar/services/api_service.dart';

import '../widgets/drawer.dart';
import '../widgets/jadwal_card.dart';

class JadwalPage extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    final ApiService _apiService = ApiService(baseUrl);
    return Scaffold(
      appBar: AppBar(
        title: Center(
          child: Text('Jadwal Keberangkatan Kapal'),
        ),
        backgroundColor: Color.fromARGB(255, 46, 183, 221),
      ),
      drawer: drawer(),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: FutureBuilder<List<Jadwal>>(
          future: _apiService.getJadwal(),
          builder: (context, snapshot) {
            if (snapshot.connectionState == ConnectionState.waiting) {
              return Center(child: CircularProgressIndicator());
            } else if (snapshot.hasError) {
              return Center(child: Text('Error: ${snapshot.error}'));
            } else if (!snapshot.hasData || snapshot.data!.isEmpty) {
              return Center(child: Text('Tidak ada jadwal tersedia'));
            } else {
              List<Jadwal> jadwalList = snapshot.data!;
              return ListView.builder(
                itemCount: jadwalList.length,
                itemBuilder: (context, index) {
                  Jadwal jadwal = jadwalList[index];
                  return ScheduleCard(
                    date:
                        '${jadwal.hari}, ${jadwal.tanggal} ${jadwal.bulan} ${jadwal.tahun}',
                    time:
                        '08.00 WIB', // Jika ada informasi waktu, ganti dengan data sebenarnya
                    port: jadwal.pelabuhan,
                    ship: jadwal.kapal,
                  );
                },
              );
            }
          },
        ),
      ),
    );
  }
}
