import 'package:flutter/material.dart';

class ScheduleCard extends StatelessWidget {
  final String date;
  final String time;
  final String port;
  final String ship;

  ScheduleCard(
      {required this.date,
      required this.time,
      required this.port,
      required this.ship});

  @override
  Widget build(BuildContext context) {
    return Container(
      margin: EdgeInsets.symmetric(vertical: 8.0),
      decoration: BoxDecoration(
        border: Border.all(color: Colors.black),
        borderRadius: BorderRadius.circular(8.0),
      ),
      child: Column(
        children: [
          Container(
            padding: EdgeInsets.all(8.0),
            color: Colors.black,
            width: double.infinity,
            child: Text(
              date,
              style: TextStyle(color: Colors.white),
            ),
          ),
          Padding(
            padding: const EdgeInsets.all(8.0),
            child: Column(
              children: [
                Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Text('Jam Keberangkatan'),
                    Text(time),
                  ],
                ),
                Divider(),
                Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Text('Pelabuhan'),
                    Text(port),
                  ],
                ),
                Divider(),
                Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    Text('Kapal'),
                    Text(ship),
                  ],
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }
}
