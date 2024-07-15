import 'package:flutter/material.dart';
import 'package:intl/intl.dart';
import 'package:pakar/api_helper.dart';
import 'package:pakar/services/api_service.dart';

import '../widgets/drawer.dart';

class Pesan extends StatefulWidget {
  @override
  _PesanState createState() => _PesanState();
}

class _PesanState extends State<Pesan> {
  String departure = 'Ulee Lheue';
  String destination = 'Balohan';
  int childrenCount = 0;
  int adultCount = 0;
  int motorCount = 0;
  int mobilCount = 0;
  String selectedShip = 'Select kapal';
  String customerName = '';
  DateTime? selectedDate;

  Future<void> _selectDate(BuildContext context) async {
    final DateTime? picked = await showDatePicker(
      context: context,
      initialDate: DateTime.now().add(Duration(days: 1)),
      firstDate: DateTime.now().add(Duration(days: 1)),
      lastDate: DateTime(2101),
    );
    if (picked != null && picked != selectedDate) {
      setState(() {
        selectedDate = picked;
      });
    }
  }

  @override
  Widget build(BuildContext context) {
    final ApiService _apiService = ApiService(baseUrl);
    return Scaffold(
      appBar: AppBar(
        title: const Text('Pesan Tiket'),
      ),
      drawer: const drawer(),
      body: Padding(
        padding: const EdgeInsets.all(16.0),
        child: SingleChildScrollView(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.spaceEvenly,
            children: [
              TextField(
                decoration: const InputDecoration(labelText: 'Nama pemesan'),
                onChanged: (value) {
                  setState(() {
                    customerName = value;
                  });
                },
              ),
              const SizedBox(height: 16),
              Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children: [
                  Expanded(
                    child: DropdownButtonFormField<String>(
                      value: departure,
                      onChanged: (value) {
                        setState(() {
                          departure = value!;
                        });
                      },
                      items: ['Ulee Lheue', 'Balohan']
                          .map((item) => DropdownMenuItem(
                                value: item,
                                child: Text(item),
                              ))
                          .toList(),
                      decoration:
                          const InputDecoration(labelText: 'Keberangkatan'),
                    ),
                  ),
                  const SizedBox(width: 8),
                  const Icon(Icons.swap_horiz),
                  const SizedBox(width: 8),
                  Expanded(
                    child: DropdownButtonFormField<String>(
                      value: destination,
                      onChanged: (value) {
                        setState(() {
                          destination = value!;
                        });
                      },
                      items: ['Balohan', 'Ulee Lheue']
                          .map((item) => DropdownMenuItem(
                                value: item,
                                child: Text(item),
                              ))
                          .toList(),
                      decoration: const InputDecoration(labelText: 'Tujuan'),
                    ),
                  ),
                ],
              ),
              const SizedBox(height: 16),
              const Text('Kategori'),
              Padding(
                padding: const EdgeInsets.all(8.0),
                child: Column(
                  children: [
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        const Text('Anak Anak'),
                        IconButton(
                          icon: const Icon(Icons.remove),
                          onPressed: () {
                            setState(() {
                              if (childrenCount > 0) childrenCount--;
                            });
                          },
                        ),
                        Text('$childrenCount'),
                        IconButton(
                          icon: const Icon(Icons.add),
                          onPressed: () {
                            setState(() {
                              childrenCount++;
                            });
                          },
                        ),
                      ],
                    ),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        const Text('Dewasa'),
                        IconButton(
                          icon: const Icon(Icons.remove),
                          onPressed: () {
                            setState(() {
                              if (adultCount > 0) adultCount--;
                            });
                          },
                        ),
                        Text('$adultCount'),
                        IconButton(
                          icon: const Icon(Icons.add),
                          onPressed: () {
                            setState(() {
                              adultCount++;
                            });
                          },
                        ),
                      ],
                    ),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        const Text('Motor'),
                        IconButton(
                          icon: const Icon(Icons.remove),
                          onPressed: () {
                            setState(() {
                              if (motorCount > 0) motorCount--;
                            });
                          },
                        ),
                        Text('$motorCount'),
                        IconButton(
                          icon: const Icon(Icons.add),
                          onPressed: () {
                            setState(() {
                              motorCount++;
                            });
                          },
                        ),
                      ],
                    ),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        const Text('Mobil'),
                        IconButton(
                          icon: const Icon(Icons.remove),
                          onPressed: () {
                            setState(() {
                              if (mobilCount > 0) mobilCount--;
                            });
                          },
                        ),
                        Text('$mobilCount'),
                        IconButton(
                          icon: const Icon(Icons.add),
                          onPressed: () {
                            setState(() {
                              mobilCount++;
                            });
                          },
                        ),
                      ],
                    ),
                  ],
                ),
              ),
              const SizedBox(height: 16),
              DropdownButtonFormField<String>(
                value: selectedShip,
                onChanged: (value) {
                  setState(() {
                    selectedShip = value!;
                  });
                },
                items: ['Select kapal', 'Aceh hebat 1', 'Aceh hebat 2']
                    .map((item) => DropdownMenuItem(
                          value: item,
                          child: Text(item),
                        ))
                    .toList(),
                decoration: const InputDecoration(labelText: 'Kapal'),
              ),
              const SizedBox(height: 16),
              const Text('Tanggal'),
              Row(
                mainAxisAlignment: MainAxisAlignment.spaceBetween,
                children: <Widget>[
                  Text(
                    selectedDate == null
                        ? '-'
                        : '${DateFormat('yyyy-MM-dd').format(selectedDate!)}',
                  ),
                  SizedBox(height: 20),
                  ElevatedButton(
                    onPressed: () => _selectDate(context),
                    child: const Text('Select date'),
                  ),
                ],
              ),
              const SizedBox(height: 16),
              Center(
                child: ElevatedButton(
                  onPressed: () async {
                    if (selectedDate == null ||
                        customerName.isEmpty ||
                        selectedShip == 'Select kapal') {
                      ScaffoldMessenger.of(context).showSnackBar(
                        const SnackBar(
                          content: Text('Please fill in all fields'),
                        ),
                      );
                      return;
                    }
                    // Menghitung harga berdasarkan kategori
                    int hargaTiket = 0; // Harga awal
                    hargaTiket += (childrenCount * 10000); // Harga anak
                    hargaTiket += (adultCount * 20000); // Harga dewasa
                    hargaTiket += (motorCount * 25000); // Harga motor
                    hargaTiket += (mobilCount * 50000); // Harga mobil
                    Map<String, dynamic> _data = {
                      "Data_penumpang": customerName,
                      "Pelabuhan_asal": departure,
                      "Pelabuhan_tujuan": destination,
                      "Kapal": selectedShip,
                      "Harga_tiket": "50000", // Placeholder value
                      "id_user": 33,
                      "status": 0,
                      "Anak": childrenCount,
                      "Dewasa": adultCount,
                      "Motor": motorCount,
                      "Mobil": mobilCount,
                      "Tanggal": DateFormat('yyyy-MM-dd').format(selectedDate!),
                    };

                    int success = await _apiService.createTiket(_data);
                    if (success == 201) {
                      ScaffoldMessenger.of(context).showSnackBar(
                        const SnackBar(
                          content: Text('Tiket berhasil dipesan'),
                        ),
                      );
                      Navigator.pushNamed(context, '/bukti');
                    } else {
                      ScaffoldMessenger.of(context).showSnackBar(
                        const SnackBar(
                          content: Text('Gagal memesan tiket'),
                        ),
                      );
                    }
                  },
                  child: const Text('Pesan Tiket'),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }
}
