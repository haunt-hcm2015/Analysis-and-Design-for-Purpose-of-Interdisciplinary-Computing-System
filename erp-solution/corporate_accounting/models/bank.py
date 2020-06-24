# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Bank(models.Model):
    _name = 'accounting.bank'
    _description = 'Accounting Bank Model'
    name = fields.Char()
    description = fields.Char()
class BankBranches(models.Model):
    _name = 'accounting.bank.branches'
    _description = 'Accounting Bank Branches Model'
    bank_address_ids = fields.One2many('accounting.bank.address', 'bank_branch_id',string='Bank Address')
    bank_id = fields.Many2one('accounting.bank', string='Bank')
    bank_branche_type_id = fields.Many2one('accounting.bank.branches.type',string='Bank Braches')
    description = fields.Char()
class BankBranchesType(models.Model):
    _name = 'accounting.bank.branches.type'
    _description = 'Accounting Bank Branches Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char('Type Name')
    description = fields.Char()
class BankAddress(models.Model):
    _name = 'accounting.bank.address'
    _description = 'Accounting Bank Address Model'
    address_type_id = fields.Many2one('accounting.bank.address.type',string='Address Type')
    bank_branch_id = fields.Many2one('accounting.bank.branches',string='Bank')
    address_id = fields.Many2one('civil.status.address', string='Address')
class BankAddressType(models.Model):
    _name = 'accounting.bank.address.type'
    _description = 'Accounting Bank Address Type Model'
    name = fields.Char('Type Name')
    description = fields.Char()