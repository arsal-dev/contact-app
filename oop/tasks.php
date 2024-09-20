<?php
// 1. Task: Vehicle Management System (Inheritance and Abstract Classes)

// Scenario: You are creating a system for a vehicle rental company. The company has different types of vehicles, including cars and bikes. Each vehicle has common attributes like make, model, and year, but the rental cost is calculated differently for cars and bikes.

// Task:

// Create an abstract class Vehicle with common properties like make, model, and year.

// Add an abstract method calculateRentalCost() that must be implemented by all subclasses.

// Create two classes Car and Bike that extend Vehicle. Implement the calculateRentalCost() method for each class.

// ---------------------------------------------------------------

// 2. Task: Payment System (Interfaces)

// Scenario: A payment processing system needs to support multiple payment methods such as CreditCard and PayPal. Each payment method should implement a method called processPayment().

// Task:

// Create an interface PaymentMethod that declares a method processPayment().

// Implement this interface in two classes: CreditCardPayment and PayPalPayment.

// The classes should contain logic (simulated with echo or print statements) to process the payment using the respective method.