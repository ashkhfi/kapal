import 'package:flutter/material.dart';
import 'package:pakar/api_helper.dart';
import 'package:pakar/pages/detail_slip.dart';
import 'package:pakar/services/api_service.dart';
import 'package:shared_preferences/shared_preferences.dart';

import '../models/tiket_model.dart';
import '../widgets/drawer.dart';

class BuktiPemesanan extends StatefulWidget {
  const BuktiPemesanan({Key? key}) : super(key: key);

  @override
  State<BuktiPemesanan> createState() => _BuktiPemesananState();
}

class _BuktiPemesananState extends State<BuktiPemesanan> {
  final ApiService _apiService = ApiService(baseUrl);
  late List<Tiket> tiketList = [];
  String id = '';

  @override
  void initState() {
    super.initState();
    fetchTiket();
    getUserId();
  }

  Future<void> fetchTiket() async {
    try {
      List<Tiket> fetchedTikets = await _apiService.getTiket();
      setState(() {
        tiketList = fetchedTikets;
      });
    } catch (e) {
      // Handle error fetching data
      print('Error fetching tiket: $e');
    }
  }

  Future<String> getUserId() async {
    SharedPreferences prefs = await SharedPreferences.getInstance();
    id = prefs.getString('userId') ?? '';
    print('id = ${id}');
    return id;
  }

  @override
  Widget build(BuildContext context) {
    getUserId();
    return Scaffold(
      appBar: AppBar(
        title: const Center(
          child: Text('Bukti Pemesanan'),
        ),
        backgroundColor: const Color.fromARGB(255, 46, 183, 221),
      ),
      drawer: const drawer(),
      body: tiketList.isEmpty
          ? const Center(child: CircularProgressIndicator())
          : ListView.builder(
              itemCount: tiketList.where((tiket) => tiket.idUser == id).length,
              itemBuilder: (context, index) {
                List<Tiket> filteredList =
                    tiketList.where((tiket) => tiket.idUser == id).toList();
                Tiket tiket = filteredList[index];

                return Card(
                  child: ListTile(
                    title: Text(
                        tiket.pelabuhanAsal + ' ke ' + tiket.pelabuhanTujuan),
                    trailing: Text('Rp. ${tiket.hargaTiket}'),
                    onTap: () {
                      Navigator.push(
                        context,
                        MaterialPageRoute(
                          builder: (context) => DetailSlip(tiket: tiket),
                        ),
                      );
                    },
                  ),
                );
              },
            ),
    );
  }
}
