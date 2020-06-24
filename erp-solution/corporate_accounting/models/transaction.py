# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Transaction(models.Model):
    _name = 'accounting.transaction'
    _description = 'Accounting Transaction Model'
    transaction_type_id = fields.Many2one('accounting.transaction.type', string='Transaction Type')
    document_id = fields.Many2one('accounting.document', string='Document')
    counter_party_id = fields.Many2one('accounting.transaction.parties', string='Counter Party')
    party_id = fields.Many2one('accounting.transaction.parties', string='Party')
    currency_ids = fields.Many2many('accounting.currency', string='Currency')
    account_id = fields.Many2one('accounting.account',string='Account')
    party_role = fields.Char('Role A')
    counnter_party_role = fields.Char('Role B')
    amount = fields.Float()
    balance = fields.Float()
    IBAN_number = fields.Integer('International Bank Account Number')
    transaction_date = fields.Date()
    
class TransactionType(models.Model):
    _name = 'accounting.transaction.type'
    _description = 'Transaction Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char()
    description = fields.Char()
class Parties(models.Model):
    _name = 'accounting.transaction.parties'
    _description = 'Transaction Parties Model'
    last_name = fields.Char('Last Name')
    middle_name = fields.Char('Middle Name')
    first_name = fields.Char('First Name')
    other_name = fields.Char('Other Name')
    date_of_birth = fields.Date('Date of Birth')
    gender = fields.Selection([
                                ('male', 'Male'), 
                                ('female', 'Female')
                            ])
    parties_address_ids = fields.One2many('accounting.transaction.address', 'parties_id', string='Parties Address')
    home_town = fields.Char('Home Town')
    nation    = fields.Char('Nation')
    religion  = fields.Char('Religion')
    image     = fields.Image('Image')
    phone_number = fields.Char('Phone Number')
    card_number_id = fields.Many2one(comodel_name='id.card', string="ID Card Number")
    household_id    = fields.Many2one(comodel_name='household.book', string="Household Book Number")
    birth_certificate_id = fields.Many2one(comodel_name='birth.certificate', string="Birth Certificate Number")
class PartiesAddress(models.Model):
    _name = 'accounting.transaction.address'
    _description = 'Transaction Parties Model'
    address_type_id = fields.Many2one('accounting.transaction.address.type',string='Address Type')
    address_id = fields.Many2one('civil.status.address', string='Address')
    parties_id = fields.Many2one('accounting.transaction.parties',string='Parties')
class PartiesAddressType(models.Model):
    _name = 'accounting.transaction.address.type'
    _description = 'Accounting Supplier Address Type Model'
    name = fields.Char('Type Name')
    description = fields.Char()
   