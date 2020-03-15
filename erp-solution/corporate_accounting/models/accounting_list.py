# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Accounting(models.Model):
    _name = 'accounting'
    _description = 'Accounting List Model'
    _rec_name = 'account_name'
    account_type_id = fields.Many2one(comodel_name='accounting.type')
    account_group_id = fields.Many2one(comodel_name='accounting.group')
    accounting_list_level_one_id = fields.Many2one('accounting.list.level.one')
    accounting_list_level_two_id = fields.Many2one('accounting.list.level.two')
    account_name = fields.Char(related="accounting_list_level_two_id.account_name")

class AccountingType(models.Model):
    _name = 'accounting.type'
    _description = 'Accounting Type Model'
    _rec_name = 'type_name'
    type_name = fields.Char('Accounting Type')
class AccountingGroup(models.Model):
    _name = 'accounting.group'
    _description = 'Accounting Group Model'
    _rec_name = 'group_name'
    group_name = fields.Char('Accounting Group')
class AccountingListLevelOne(models.Model):
    _name = 'accounting.list.level.one'
    _description = 'Accounting List Level One Model'
    _rec_name = 'account_number_level_one'
    account_number_level_one = fields.Integer('Account Number Level One')
class AccountingListLevelTwo(models.Model):
    _name = 'accounting.list.level.two'
    _description = 'Accounting List Level Two Model'
    _rec_name = 'account_number_level_two'
    account_number_level_two = fields.Integer('Account Number Level Two')
    account_name = fields.Char("Account Name")
