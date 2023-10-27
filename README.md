# Bestada-Adib
Repository untuk melengkapi test case dari PT. Bestari Aditama Persada 
# API Documentation for Parking Application

This documentation provides information about the RESTful API for a parking application.

## Table of Contents
1. [Introduction](#introduction)
2. [Endpoints](#endpoints)
    1. [Check Parking Availability](#check-parking-availability)
    2. [Park Vehicle](#park-vehicle)
    3. [Exit Parking](#exit-parking)

## Introduction

The parking application provides a simple API to manage parking slots in various blocks. Each block has a certain number of parking slots that can be occupied as vehicles enter and become empty when vehicles exit.

## Endpoints

### Check Parking Availability

- **Endpoint**: `/parking`
- **Method**: GET
- **Description**: Get information about parking blocks and their slot availability.
- **Response**: JSON containing details of each parking block and its available slots.

### Park Vehicle

- **Endpoint**: `/parking/{block_name}`
- **Method**: POST
- **Description**: Park a vehicle in a specific parking block.
- **Parameters**: 
  - `block_name` (string): The name of the parking block where the vehicle will be parked.
- **Response**: 
  - 200 OK: Vehicle successfully parked with a message.
  - 400 Bad Request: If the block is unavailable or full.

### Exit Parking

- **Endpoint**: `/parking/{block_name}`
- **Method**: DELETE
- **Description**: Allow a vehicle to exit a specific parking block.
- **Parameters**: 
  - `block_name` (string): The name of the parking block from which the vehicle will exit.
- **Response**: 
  - 200 OK: Vehicle has successfully exited with a message.
  - 400 Bad Request: If the block is unavailable or already full.

## Example

### Check Parking Availability

- **Request**: `GET /parking`
- **Response**:

```json
{
  "BlockA": {
    "total_slots": 20,
    "available_slots": 10
  },
  "BlockB": {
    "total_slots": 15,
    "available_slots": 5
  },
  "BlockC": {
    "total_slots": 10,
    "available_slots": 8
  }
}
```
Park Vehicle

    *Request: POST /parking/BlockA
    *Response (200 OK):
```json
{
  "message": "Vehicle successfully parked in BlockA"
}
Exit Parking

    *Request: DELETE /parking/BlockA
    *Response (200 OK):
```json
{
  "message": "Vehicle has successfully exited from BlockA"
}
    *Response (400 Bad Request):
```json

{
  "message": "Block is unavailable or already full"
}


