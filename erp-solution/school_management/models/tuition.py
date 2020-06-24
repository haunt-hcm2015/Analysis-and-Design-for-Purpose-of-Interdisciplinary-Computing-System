# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class TuitionDebt(models.Model):
    _name = 'school.tuition.debt'
    _description = 'Tuition Debt Model'
class TuitionCollected(models.Model):
    _name = 'school.tuition.collected'
    _description = 'Tuition Collected Model'
class TuitionStatus(models.Model):
    _name = 'school.tuition.status'
    _description = 'Tuition Status Model'
class TuitionType(models.Model):
    _name = 'school.tuition.type'
    _description = 'Tuition Type Model'
class PaymentMethod(models.Model):
    _name = 'school.payment.method'
    _description = 'Payment Method Model'
class CreditCard(models.Model):
    _name = 'school.credit.card'
    _description = 'Credit Card Model'

