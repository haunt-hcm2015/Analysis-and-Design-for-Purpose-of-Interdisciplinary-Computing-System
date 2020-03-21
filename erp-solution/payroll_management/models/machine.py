# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class Machine(models.Model):
    _name = 'payroll.machine'
    _description = 'Machine Model'
class MachineType(models.Model):
    _name = 'payroll.machine.type'
    _description = 'Machine Model'