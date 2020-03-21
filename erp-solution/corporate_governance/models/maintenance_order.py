# -*- coding: utf-8 -*-
from odoo import models, fields, api, _ 
class MaintenanceOrder(models.Model):
    _name = 'governance.maintenance.order'
    _description = 'Maintenance Order Model'
class CommandParameter(models.Model):
    _name = 'governance.command.parameter'
    _description = 'Command Parameter Model'
  